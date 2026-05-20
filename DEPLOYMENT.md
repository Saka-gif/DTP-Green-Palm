# Deployment Guide untuk Render.com

## Prerequisites
- GitHub account dengan repository ini
- Render.com account (gratis)
- Cloudinary account (untuk media upload)

---

## Method 1: Deployment Otomatis (Recommended)

### Step 1: Push ke GitHub
```bash
git add Dockerfile .dockerignore render.yaml
git commit -m "Add Dockerfile dan deployment config untuk Render"
git push origin main
```

### Step 2: Connect ke Render.com
1. Go to https://dashboard.render.com
2. Click "New +" → "Web Service"
3. Click "Connect a repository"
4. Authorize GitHub dan select repository ini
5. Fill form:
   - **Name**: `green-palm` (atau nama lainnya)
   - **Environment**: `Docker`
   - **Region**: `Singapore` (atau sesuai preferensi)
   - **Branch**: `main`
   - **Build Command**: (kosongkan - Render akan use Dockerfile)
   - **Start Command**: (kosongkan - Render akan use CMD di Dockerfile)

### Step 3: Set Environment Variables
Di halaman Web Service, go ke "Environment":
```
APP_KEY=base64:XXXXXX (akan auto-generate di start)
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-app.onrender.com

DB_CONNECTION=pgsql
DB_HOST=your-database-host
DB_PORT=5432
DB_DATABASE=your_db_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password

CLOUDINARY_URL=cloudinary://KEY:SECRET@CLOUD_NAME
CLOUDINARY_KEY=your_key
CLOUDINARY_SECRET=your_secret
CLOUDINARY_CLOUD_NAME=your_cloud_name
CLOUDINARY_UPLOAD_PRESET=your_preset (opsional)

SESSION_DRIVER=cookie
CACHE_DRIVER=array
QUEUE_CONNECTION=sync
```

### Step 4: Deploy Database
1. Di Render dashboard, click "New +" → "PostgreSQL"
2. Set name: `green-palm-db`
3. Get connection string dari database settings
4. Update `DB_HOST`, `DB_USERNAME`, `DB_PASSWORD` di Step 3

### Step 5: Deploy
Click "Deploy" dan tunggu ~5-10 menit.

---

## Method 2: Manual Build & Push

### Step 1: Build Docker Image Locally
```bash
docker build -t green-palm:latest .
```

### Step 2: Push ke Docker Registry
```bash
# Contoh dengan Docker Hub
docker tag green-palm:latest your-username/green-palm:latest
docker push your-username/green-palm:latest
```

### Step 3: Deploy ke Render
1. Di Render, create Web Service
2. Choose "Docker Image Registry"
3. Input docker image URL Anda
4. Set environment variables (same as Method 1 Step 3)

---

## Environment Variables Explained

| Variable | Value | Notes |
|----------|-------|-------|
| APP_KEY | Generate dengan `php artisan key:generate` | Format: `base64:xxxxx` |
| APP_ENV | `production` | Required untuk production |
| APP_DEBUG | `false` | Jangan set true di production |
| DB_CONNECTION | `pgsql` | Render recommend PostgreSQL |
| CLOUDINARY_* | Dari Cloudinary dashboard | Required untuk upload gambar |
| SESSION_DRIVER | `cookie` | Recommended untuk stateless apps |

---

## Testing After Deployment

1. **Check logs**:
   - Di Render dashboard, click "Logs"
   - Lihat jika ada error saat startup

2. **Check health**:
   ```bash
   curl https://your-app.onrender.com/up
   ```
   Harus return `OK`

3. **Check admin panel**:
   - Go to `https://your-app.onrender.com/admin`
   - Login dengan credentials Anda
   - Try add rumah baru dengan image upload

---

## Troubleshooting

### ❌ "Build failed"
- Check Dockerfile syntax: `docker build .` locally
- Check logs di Render
- Ensure composer.json valid: `composer validate`

### ❌ "Failed to connect database"
- Verify DB credentials di environment variables
- Check database postgre sudah running di Render
- Run migrations: Render auto-run saat startup

### ❌ "Image upload fails"
- Verify CLOUDINARY_* variables correct
- Check Cloudinary API key active
- Check storage permissions di Laravel

### ❌ "App keep crashing"
- Check logs: `render logs`
- Ensure APP_KEY is set
- Check database connection
- Try build locally first: `docker build -t test . && docker run -p 8080:8080 test`

---

## Performance Tips

- Use PostgreSQL (lebih cepat dari SQLite)
- Enable query caching jika possible
- Compress images sebelum upload ke Cloudinary
- Use Render's free tier hanya untuk testing
- Scale ke paid plan jika traffic tinggi

---

## Redeploy

Otomatis redeploy ketika:
- Push ke branch yang di-deploy (default: `main`)
- Manual: Click "Manual Deploy" di Render dashboard

Cancel deployment:
- Di Render, click "Cancel Deployment"

---

## Next Steps

1. ✅ Prepare environment variables
2. ✅ Connect GitHub ke Render
3. ✅ Set database
4. ✅ Deploy
5. ✅ Test upload image
6. ✅ Monitor logs untuk errors

Sukses! 🚀
