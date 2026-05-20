# Docker & Render Deployment Setup

## 📁 Files yang Ditambah

- **Dockerfile** - Multi-stage build untuk production deployment
- **docker-compose.yml** - Local testing dengan MySQL
- **render.yaml** - Config untuk Render.com deployment
- **DEPLOYMENT.md** - Panduan lengkap deployment

---

## 🧪 Testing Docker Locally

### Prerequisite
- Install [Docker Desktop](https://www.docker.com/products/docker-desktop)
- Clone/prepare project ini

### Method 1: Docker Compose (Recommended)

```bash
# 1. Setup .env jika belum ada
cp .env.example .env
# Edit .env dan set CLOUDINARY_* variables

# 2. Build dan run dengan MySQL
docker-compose up --build

# 3. Access aplikasi
# - Web: http://localhost:8080
# - Admin: http://localhost:8080/admin
# - Database: localhost:3306 (MySQL)
```

**Stop services:**
```bash
docker-compose down
```

**View logs:**
```bash
docker-compose logs -f app
```

---

### Method 2: Standalone Docker

```bash
# 1. Build image
docker build -t green-palm:latest .

# 2. Run container
docker run -p 8080:8080 \
  -e APP_ENV=production \
  -e APP_DEBUG=false \
  -e CLOUDINARY_URL=your_url \
  -e CLOUDINARY_KEY=your_key \
  -e CLOUDINARY_SECRET=your_secret \
  -e CLOUDINARY_CLOUD_NAME=your_cloud \
  green-palm:latest

# 3. Access aplikasi
# http://localhost:8080
```

---

## 🚀 Deploy ke Render.com

See [DEPLOYMENT.md](./DEPLOYMENT.md) untuk panduan lengkap.

**Quick start:**
1. Push code ke GitHub
2. Go to https://dashboard.render.com
3. Create new Web Service dengan Dockerfile
4. Set environment variables
5. Deploy!

---

## 📋 Environment Variables Diperlukan

### Development (docker-compose)
Sudah di-set di docker-compose.yml, tapi perlu update:
- `CLOUDINARY_*` - Set di .env

### Production (Render)
Set di Render dashboard:
```
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-app.onrender.com
DB_* (jika pakai external database)
CLOUDINARY_*
```

---

## 🔍 Common Issues & Solutions

### ❌ Port 8080 already in use
```bash
# Find process using port 8080
lsof -i :8080  # macOS/Linux
netstat -ano | findstr :8080  # Windows

# Kill process or use different port
docker run -p 8081:8080 green-palm:latest
```

### ❌ Cloudinary upload fails
- Check CLOUDINARY_* environment variables
- Verify API key di Cloudinary dashboard
- Check logs: `docker-compose logs app`

### ❌ Database connection error
- Ensure MySQL/PostgreSQL is running
- Check DB_* credentials di .env
- Migrations auto-run di startup

### ❌ Build fails
```bash
# Build dengan verbose output
docker build --progress=plain -t green-palm:latest .

# Check Dockerfile syntax
docker run --rm -i hadolint/hadolint < Dockerfile
```

---

## 📊 Performance

### Free Tier (Render)
- CPU: Shared
- Memory: 512 MB
- Sleep: After 15 min inactivity
- Cold start: ~30 seconds
- Recommended untuk: Testing, small projects

### Paid Tier
- Dedicated resources
- No auto-sleep
- 99.9% uptime SLA
- Recommended untuk: Production apps

---

## 🔐 Security Best Practices

1. ✅ Never commit `.env` file
2. ✅ Use strong database passwords
3. ✅ Set `APP_DEBUG=false` di production
4. ✅ Verify SSL certificate (auto-setup di Render)
5. ✅ Keep dependencies updated
6. ✅ Backup database regularly

---

## 📝 Useful Commands

### Docker
```bash
# Build image
docker build -t green-palm:latest .

# Run container
docker run -p 8080:8080 green-palm:latest

# View running containers
docker ps

# View logs
docker logs <container_id>

# Stop container
docker stop <container_id>

# Remove image
docker rmi green-palm:latest
```

### Docker Compose
```bash
# Start services
docker-compose up -d

# Stop services
docker-compose down

# View logs
docker-compose logs -f

# Run command in container
docker-compose exec app php artisan tinker

# Rebuild
docker-compose up --build
```

---

## 📚 Resources

- [Docker Documentation](https://docs.docker.com/)
- [Laravel Docker Guide](https://laravel.com/docs/deployment)
- [Render Deployment Docs](https://render.com/docs)
- [Compose File Reference](https://docs.docker.com/compose/compose-file/)

---

## ✅ Next Steps

1. Test locally dengan `docker-compose up`
2. Verify image upload works
3. Push ke GitHub
4. Deploy ke Render.com
5. Monitor logs untuk errors
6. Celebrate! 🎉
