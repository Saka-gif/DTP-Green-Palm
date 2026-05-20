# Stage 1: Build Node Assets
FROM node:20-alpine AS node_builder

WORKDIR /app

# Copy package files
COPY package*.json ./

# Install Node dependencies
RUN npm install

# Copy source files
COPY . .

# Build Vite assets
RUN npm run build

# Stage 2: PHP Application
FROM php:8.2-apache

# Set working directory
WORKDIR /app

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
    gd \
    zip \
    pdo \
    pdo_mysql \
    bcmath \
    ctype \
    fileinfo \
    json \
    mbstring

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy application files
COPY --chown=www-data:www-data . .

# Copy built assets from Node stage
COPY --from=node_builder --chown=www-data:www-data /app/public/build ./public/build

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Create necessary directories
RUN mkdir -p storage/logs storage/framework/cache storage/framework/sessions \
    && chown -R www-data:www-data storage bootstrap/cache

# Set permissions
RUN chmod -R 755 storage bootstrap/cache

# Enable Apache rewrite module
RUN a2enmod rewrite

# Configure Apache VirtualHost
RUN cat > /etc/apache2/sites-available/000-default.conf <<'EOF'
<VirtualHost *:8080>
    ServerName localhost
    DocumentRoot /app/public

    <Directory /app/public>
        AllowOverride All
        Require all granted
        
        <IfModule mod_rewrite.c>
            RewriteEngine On
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            RewriteRule ^(.*)$ index.php/$1 [L]
        </IfModule>
    </Directory>

    <Directory /app>
        AllowOverride All
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
EOF

# Update Apache port
RUN sed -i 's/Listen 80/Listen 8080/' /etc/apache2/ports.conf

# Set environment variables
ENV APP_ENV=production \
    APP_DEBUG=false

# Expose port 8080 for Render.com
EXPOSE 8080

# Create start script
RUN cat > /app/start.sh <<'EOF'
#!/bin/bash
set -e

# Generate application key if not set
if [ -z "$APP_KEY" ]; then
    php artisan key:generate
fi

# Run migrations if DB is available
if [ ! -z "$DATABASE_URL" ] || [ ! -z "$DB_HOST" ]; then
    php artisan migrate --force
fi

# Cache config and routes for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start Apache
apache2-foreground
EOF

RUN chmod +x /app/start.sh

# Health check
HEALTHCHECK --interval=30s --timeout=10s --start-period=40s --retries=3 \
    CMD curl -f http://localhost:8080/up || exit 1

CMD ["/app/start.sh"]
