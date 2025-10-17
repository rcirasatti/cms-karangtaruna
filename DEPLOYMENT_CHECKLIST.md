# ✅ CHECKLIST DEPLOYMENT RAILWAY - Step by Step

**Tanggal**: 17 Oktober 2025  
**Project**: CMS Karang Taruna  
**Status**: Ready for Deployment

---

## 📋 FASE 1: PERSIAPAN LOKAL (5-10 menit)

### ✅ 1.1 Verifikasi Project Lokal
- [ ] Project folder: `d:\Magang\cms-karangtaruna`
- [ ] Git sudah initialized: `git status` ✓
- [ ] Branch: `test` (current branch)
- [ ] Tidak ada uncommitted changes
- [ ] `composer.json` dan `package.json` ada

### ✅ 1.2 Verifikasi File Konfigurasi
- [ ] `.env` file sudah ada dengan `APP_KEY`
- [ ] `Procfile` sudah dibuat
- [ ] `railway.json` sudah dibuat
- [ ] `.railway/nixpacks.toml` sudah dibuat
- [ ] `bin/heroku_release.sh` sudah dibuat

### ✅ 1.3 Commit Persiapan Deployment
```powershell
cd d:\Magang\cms-karangtaruna
git add .
git commit -m "Add Railway deployment configuration"
```

---

## 📋 FASE 2: GITHUB SETUP (10-15 menit)

### ✅ 2.1 Buat Repository GitHub
- [ ] Login ke GitHub (https://github.com)
- [ ] Klik **"+"** → **New repository**
- [ ] Repository name: `cms-karangtaruna`
- [ ] Visibility: **Public** (agar Railway bisa akses)
- [ ] **Jangan** centang "Add README" (sudah ada)
- [ ] Klik **Create repository**

### ✅ 2.2 Hubungkan Local Repository ke GitHub
Ganti `YOUR_USERNAME` dengan username GitHub Anda:

```powershell
cd d:\Magang\cms-karangtaruna
git remote set-url origin https://github.com/YOUR_USERNAME/cms-karangtaruna.git
git branch -M main
git push -u origin main
```

Atau jika ingin push ke branch `test`:
```powershell
git push -u origin test
```

### ✅ 2.3 Verifikasi di GitHub
- [ ] Buka https://github.com/YOUR_USERNAME/cms-karangtaruna
- [ ] Lihat files sudah ter-upload
- [ ] Lihat branches (main atau test)

---

## 📋 FASE 3: RAILWAY SETUP (15-20 menit)

### ✅ 3.1 Buat Railway Account
- [ ] Buka https://railway.app
- [ ] Klik **Sign up** atau **Login**
- [ ] Pilih **Login with GitHub**
- [ ] Authorize Railway untuk akses GitHub
- [ ] Dashboard Railway muncul

### ✅ 3.2 Buat Project Baru di Railway
- [ ] Di Railway Dashboard, klik **New Project**
- [ ] Pilih **Deploy from GitHub repo**
- [ ] Cari dan klik repository `cms-karangtaruna`
- [ ] Pilih branch: **test** (atau main, sesuai pilihan)
- [ ] Klik **Deploy**
- [ ] Tunggu build dimulai (5-10 menit)

### ✅ 3.3 Monitoring Build Process
- [ ] Di Railway, klik project yang baru dibuat
- [ ] Tab **Deployments** untuk melihat progress
- [ ] Lihat logs untuk memastikan:
  - `composer install` ✓
  - `npm install` ✓
  - `npm run build` ✓
  - `php artisan migrate` ✓
  - `php artisan db:seed` ✓

---

## 📋 FASE 4: DATABASE CONFIGURATION (10-15 menit)

### ✅ 4.1 Tambah PostgreSQL Database
- [ ] Di Railway project, klik **Create**
- [ ] Pilih **Database** → **PostgreSQL**
- [ ] Tunggu PostgreSQL service created
- [ ] Railway otomatis set environment variables

### ✅ 4.2 Verifikasi Database Variables
Di Railway Variables, check sudah ada:
- [ ] `DB_HOST` (biasanya: `${{Postgres.PGHOST}}`)
- [ ] `DB_PORT` (biasanya: `5432`)
- [ ] `DB_DATABASE` 
- [ ] `DB_USERNAME`
- [ ] `DB_PASSWORD`

### ✅ 4.3 Set Database Connection Type
- [ ] Di Railway Variables, pastikan: `DB_CONNECTION=pgsql`
- [ ] Jangan gunakan MySQL, PostgreSQL lebih cocok untuk Railway

---

## 📋 FASE 5: ENVIRONMENT VARIABLES CONFIGURATION (10 menit)

### ✅ 5.1 Buka Railway Variables
- [ ] Di Railway project, klik tab **Variables**
- [ ] Klik **Raw Editor** untuk edit lebih mudah

### ✅ 5.2 Set Variables Production
Paste ini di Railway Variables:
```
APP_NAME=karangtaruna
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:wBQ+lKdM1N5DxnW1W/BHCFTsMmY9rwtOtmYLQh2bgQE=
APP_URL=https://cms-karangtaruna-production-xxxx.up.railway.app
DB_CONNECTION=pgsql
DB_HOST=${{Postgres.PGHOST}}
DB_PORT=${{Postgres.PGPORT}}
DB_DATABASE=${{Postgres.PGDATABASE}}
DB_USERNAME=${{Postgres.PGUSER}}
DB_PASSWORD=${{Postgres.PGPASSWORD}}
SESSION_DRIVER=database
SESSION_LIFETIME=120
CACHE_STORE=database
LOG_CHANNEL=single
LOG_LEVEL=debug
QUEUE_CONNECTION=database
FILESYSTEM_DISK=local
```

### ✅ 5.3 Update APP_URL setelah Deploy
- [ ] Tunggu deployment selesai
- [ ] Lihat URL aplikasi (format: `https://cms-karangtaruna-production-xxxx.up.railway.app`)
- [ ] Update `APP_URL` dengan URL yang benar
- [ ] Save (Railway re-deploy otomatis)

---

## 📋 FASE 6: WAIT & VERIFY (30-60 menit)

### ✅ 6.1 Tunggu Build Selesai
- [ ] Check Railway Deployments tab
- [ ] Status berubah dari "Building" → "Running"
- [ ] Lihat logs untuk error (jika ada)

### ✅ 6.2 Test Aplikasi
- [ ] Klik **Public URL** dari Railway
- [ ] Halaman home loading ✓
- [ ] Cek database queries working (tentang, profil, dll)
- [ ] Cek CSS & JS loading (tidak ada 404)

### ✅ 6.3 Troubleshooting (jika ada error)
- [ ] Check build logs untuk error message
- [ ] Common issues:
  - Database connection error → verifikasi DB variables
  - Storage permission denied → normal di free tier
  - Asset 404 → pastikan `npm run build` berhasil

---

## 📋 FASE 7: MAINTENANCE (After Deploy)

### ✅ 7.1 View Production Logs
```powershell
# Install Railway CLI (opsional)
npm install -g @railway/cli

# Login
railway login

# Link project
railway link

# View logs
railway log
```

### ✅ 7.2 Run Command di Production
```powershell
# Contoh: Migration baru
railway run php artisan migrate

# Contoh: Seed data
railway run php artisan db:seed

# Contoh: Clear cache
railway run php artisan config:clear
```

### ✅ 7.3 Future Deployments
Untuk deploy kode baru:
1. Edit kode lokal
2. Push ke GitHub:
   ```powershell
   git add .
   git commit -m "Your changes"
   git push origin test
   ```
3. Railway otomatis trigger build & deploy

---

## 📋 FASE 8: OPTIONAL - CUSTOM DOMAIN

### ✅ 8.1 Tambah Custom Domain (Opsional)
- [ ] Di Railway Settings, buka **Domains**
- [ ] Klik **Add Domain**
- [ ] Masukkan domain (contoh: `cms.karangtaruna.com`)
- [ ] Note DNS records dari Railway

### ✅ 8.2 Update DNS di Registrar
- [ ] Login registrar domain (GoDaddy, Namecheap, dll)
- [ ] Update DNS sesuai Railway instruction
- [ ] Tunggu propagasi (5-48 jam)

---

## 📊 QUICK REFERENCE

### Useful URLs
- **Railway Dashboard**: https://railway.app/dashboard
- **GitHub Repository**: https://github.com/YOUR_USERNAME/cms-karangtaruna
- **Application URL**: https://cms-karangtaruna-production-xxxx.up.railway.app
- **Laravel Docs**: https://laravel.com/docs/11
- **Railway Docs**: https://docs.railway.app

### Troubleshooting Commands
```powershell
# Check git status
git status

# View recent commits
git log --oneline -5

# View current remote
git remote -v

# Check Railway service status
railway env
```

### Database Access (Optional)
Untuk akses database di production:
```powershell
railway run php artisan tinker
# Atau
railway run psql -U $DB_USERNAME -h $DB_HOST -d $DB_DATABASE
```

---

## ⚠️ IMPORTANT NOTES

1. **Don't** commit `.env` file ke repository (sudah di `.gitignore`)
2. **Do** set environment variables di Railway dashboard, bukan di `.env`
3. **PostgreSQL** lebih recommended untuk Railway dibanding MySQL
4. **Storage folder** di Railway read-only untuk free tier
5. **Automatic deploy** happen when you push to GitHub
6. **Migration runs** otomatis saat deployment dimulai
7. **Database reset** jika menggunakan `migrate:fresh --seed`

---

## 📞 SUPPORT CONTACTS

Jika ada masalah:
1. Check Railway logs: Railway Dashboard → Deployments → View logs
2. Check Laravel error: produksi app logs
3. Railway Discord: https://discord.gg/railway
4. Laravel community: https://laracasts.com

---

**Status**: ✅ Ready for Deployment  
**Created**: 17 Oktober 2025  
**Last Updated**: 17 Oktober 2025

---

## 🎯 SUMMARY

Setelah semua step di atas selesai:
- ✅ Project di-host di Railway
- ✅ Database PostgreSQL setup
- ✅ Auto-deploy whenever push to GitHub
- ✅ Aplikasi live di internet
- ✅ Siap untuk production

**Happy Deploying!** 🚀
