# 🚀 Panduan Deployment Laravel ke Railway

Dokumen ini berisi langkah-langkah lengkap untuk mendeploy project Laravel CMS Karang Taruna ke Railway.

## Prasyarat

1. **GitHub Account** - Untuk hosting repository
2. **Railway Account** - Untuk hosting aplikasi
3. **Git terinstall** - Di komputer lokal
4. **GitHub Installed CLI (opsional)** - Untuk kemudahan push dari terminal

## Langkah 1: Persiapan Repository GitHub

### 1.1 Buat Repository di GitHub

1. Buka [github.com](https://github.com)
2. Login dengan akun Anda
3. Klik **"+"** di kanan atas → **New repository**
4. Isi nama repository: `cms-karangtaruna`
5. Pilih **Public** atau **Private** (sesuai preferensi)
6. **Jangan** centang "Add a README file" (sudah ada)
7. Klik **Create repository**

### 1.2 Push Project ke GitHub

```powershell
# Navigasi ke folder project
cd d:\Magang\cms-karangtaruna

# Tambah remote URL (ganti USERNAME dengan username GitHub Anda)
git remote set-url origin https://github.com/USERNAME/cms-karangtaruna.git

# Push ke GitHub
git push -u origin test
```

## Langkah 2: Setup Railway Account

1. Buka [railway.app](https://railway.app)
2. Klik **Sign up** atau **Login** dengan GitHub account
3. Authorize Railway untuk akses GitHub Anda
4. Pilih plan (gratis tersedia untuk starter)

## Langkah 3: Buat Project di Railway

### 3.1 Membuat Project Baru

1. Di Railway Dashboard, klik **New Project**
2. Pilih **Deploy from GitHub repo**
3. Pilih repository `cms-karangtaruna`
4. Pilih branch `test` (atau branch favorit Anda)
5. Klik **Deploy**

### 3.2 Konfigurasi Environment Variables

Setelah project terbuat, Railway akan memulai build. Sementara itu, kita setup environment variables:

1. Di Railway Dashboard, klik project Anda
2. Klik tab **Variables**
3. Tambahkan variabel berikut:

```
APP_ENV=production
APP_DEBUG=false
APP_URL=https://<YOUR-RAILWAY-APP-URL>.up.railway.app (akan diupdate setelah deploy)
DB_CONNECTION=pgsql
DB_HOST=${{Postgres.PGHOST}}
DB_PORT=${{Postgres.PGPORT}}
DB_DATABASE=${{Postgres.PGDATABASE}}
DB_USERNAME=${{Postgres.PGUSER}}
DB_PASSWORD=${{Postgres.PGPASSWORD}}
SESSION_DRIVER=database
CACHE_STORE=database
LOG_CHANNEL=single
LOG_LEVEL=debug
```

### 3.3 Menambah Database PostgreSQL

1. Di Railway Dashboard project, klik **Create**
2. Pilih **Database** → **PostgreSQL**
3. Railway akan otomatis mengisi variabel database di atas

### 3.4 Menambah Service Environment Variables

Untuk production, pastikan:
- `APP_KEY` sudah ada (biasanya sudah dari `.env.example`)
- `APP_NAME=karangtaruna` (sudah ada)

Jika belum, generate dengan:
```
php artisan key:generate
```
Copy value `APP_KEY` dari `.env` lokal dan paste di Railway Variables.

## Langkah 4: Deployment Otomatis

### 4.1 Proses Build Railway

Railway akan otomatis:
1. ✅ Clone repository dari GitHub
2. ✅ Install PHP dependencies (`composer install`)
3. ✅ Install Node dependencies (`npm install`)
4. ✅ Build assets (`npm run build`)
5. ✅ Cache config dan routes (`php artisan config:cache`, `php artisan route:cache`)
6. ✅ Jalankan migrations (`php artisan migrate:fresh --seed --force`)

### 4.2 Memantau Build Progress

1. Di Railway Dashboard, klik project
2. Klik tab **Deployments**
3. Lihat status build real-time
4. Jika ada error, klik untuk melihat logs detail

## Langkah 5: Verifikasi Deployment

### 5.1 Cek URL Aplikasi

1. Di Railway Dashboard, klik service aplikasi Anda
2. Buka tab **Settings**
3. Cari **Public URL** atau **Railway URL**
4. URL format: `https://cms-karangtaruna-production-xxxx.up.railway.app`

### 5.2 Update APP_URL

Setelah dapat URL dari Railway:

1. Di Railway Variables, update:
```
APP_URL=https://cms-karangtaruna-production-xxxx.up.railway.app
```

2. Push update konfigurasi ke GitHub:
```powershell
git add .
git commit -m "Update Railway configuration"
git push origin test
```

3. Railway akan otomatis re-deploy

### 5.3 Test Aplikasi

1. Buka URL aplikasi di browser
2. Test fitur utama:
   - Home page loading
   - Database queries working
   - Asset (CSS, JS) loading correctly

## Langkah 6: Konfigurasi Custom Domain (Opsional)

### 6.1 Menambah Custom Domain

1. Di Railway Dashboard, klik service aplikasi
2. Klik **Settings** → **Domains**
3. Klik **Add Domain**
4. Masukkan domain Anda (contoh: `cms.karangtaruna.com`)
5. Follow instruksi DNS dari Railway

### 6.2 Update DNS di Registrar Domain

1. Login ke registrar domain Anda (GoDaddy, Namecheap, dll)
2. Update DNS records sesuai instruksi Railway
3. Tunggu propagasi (5-48 jam)

## Langkah 7: Environment Variables untuk Production

Pastikan berikut sudah dikonfigurasi di Railway:

```
# APP Configuration
APP_NAME=karangtaruna
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:wBQ+lKdM1N5DxnW1W/BHCFTsMmY9rwtOtmYLQh2bgQE=
APP_URL=https://cms-karangtaruna-production-xxxx.up.railway.app

# Database (auto-filled jika menggunakan Railway PostgreSQL)
DB_CONNECTION=pgsql
DB_HOST=${{Postgres.PGHOST}}
DB_PORT=${{Postgres.PGPORT}}
DB_DATABASE=${{Postgres.PGDATABASE}}
DB_USERNAME=${{Postgres.PGUSER}}
DB_PASSWORD=${{Postgres.PGPASSWORD}}

# Session & Cache
SESSION_DRIVER=database
SESSION_LIFETIME=120
CACHE_STORE=database

# Logging
LOG_CHANNEL=single
LOG_LEVEL=debug

# Queue
QUEUE_CONNECTION=database

# Filesystem
FILESYSTEM_DISK=local
```

## Langkah 8: Maintenance & Monitoring

### 8.1 Melihat Application Logs

```powershell
# Dari terminal lokal:
railway log
```

### 8.2 Menjalankan Command Artisan di Production

```powershell
# Format: railway run <command>
railway run php artisan migrate
railway run php artisan tinker
railway run php artisan db:seed
```

### 8.3 Automatic Deployments

Railway akan otomatis re-deploy saat:
1. Anda push ke branch yang di-deploy (branch `test`)
2. Setiap push trigger rebuild dan deployment baru

### 8.4 Manual Redeploy

Jika perlu redeploy manual:
1. Di Railway Dashboard, klik project
2. Klik **Deployments**
3. Pilih deployment terbaru
4. Klik **Redeploy**

## Troubleshooting

### Build Gagal - PHP Version Issue
**Error**: `PHP version mismatch`
**Solusi**: Pastikan `composer.json` require PHP ^8.2 atau gunakan nixpacks.toml

### Database Migration Error
**Error**: `SQLSTATE[HY000]` atau connection error
**Solusi**: 
- Pastikan PostgreSQL service sudah added
- Check credentials di Railway Variables
- Pastikan DB sudah ready sebelum app start

### Assets Not Loading
**Error**: CSS/JS file 404
**Solusi**:
- Pastikan `npm run build` berhasil di build logs
- Jika gagal, rebuild: `railway run npm run build`

### Cannot Upload Files/Photos
**Error**: `Storage permission denied`
**Solusi**:
- Railway folder `/storage` read-only untuk free tier
- Gunakan S3 atau service storage lain (konfigurasi di `.env`)

## Untuk Deployment Next Time

Setelah ini, deployment berikutnya cukup:

```powershell
# 1. Edit kode lokal
# 2. Commit & push ke GitHub
git add .
git commit -m "Your commit message"
git push origin test

# Railway otomatis akan re-deploy!
```

## Referensi Useful Commands

```powershell
# Lihat logs dari Railway
railway log

# Login ke Railway CLI
railway login

# Link project lokal dengan Railway
railway link

# Menjalankan perintah di production
railway run php artisan migrate

# Status deployment
railway env

# View environment variables
railway variables
```

## Support & Bantuan

- **Railway Docs**: https://docs.railway.app
- **Laravel Docs**: https://laravel.com/docs
- **Railway Discord**: https://discord.gg/railway

---

**Dokumentasi dibuat**: 17 Oktober 2025
**Terakhir diupdate**: 17 Oktober 2025
