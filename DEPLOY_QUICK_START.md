# 🚀 PANDUAN SINGKAT - Deploy ke Railway dalam 5 Langkah

Saya sudah siapkan semuanya di project ini. Sekarang tinggal Anda jalankan langkah-langkah berikut:

## Step 1️⃣: Push Code ke GitHub

```powershell
# Buka Terminal, masuk ke folder project
cd d:\Magang\cms-karangtaruna

# Tambah semua file yang sudah dipersiapkan
git add .
git commit -m "Add Railway deployment files"

# Push ke GitHub (pastikan sudah ada di GitHub dulu!)
# Jika belum ada, buat repository baru di GitHub.com dulu
git push origin test
# atau
git push origin main
```

**Catatan**: Ganti `origin` URL dengan URL repository GitHub Anda jika belum ada:
```powershell
git remote set-url origin https://github.com/USERNAME/cms-karangtaruna.git
```

---

## Step 2️⃣: Buat Account Railway & Project

1. Buka https://railway.app
2. Klik **Sign up** (gunakan GitHub account)
3. Authorize Railway untuk akses GitHub Anda
4. Klik **New Project**
5. Pilih **Deploy from GitHub repo**
6. Cari repository `cms-karangtaruna` dan klik
7. Pilih branch yang ingin di-deploy (test atau main)
8. Klik **Deploy**
9. **Tunggu build selesai** (biasanya 5-10 menit)

---

## Step 3️⃣: Tambah Database PostgreSQL

1. Di Railway project Anda, klik **Create**
2. Pilih **Database** → **PostgreSQL**
3. Tunggu PostgreSQL service dibuat (biasanya otomatis set variables)

---

## Step 4️⃣: Set Environment Variables

Di Railway project Anda → tab **Variables** → masukkan:

```
APP_NAME=karangtaruna
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:wBQ+lKdM1N5DxnW1W/BHCFTsMmY9rwtOtmYLQh2bgQE=
DB_CONNECTION=pgsql
DB_HOST=${{Postgres.PGHOST}}
DB_PORT=${{Postgres.PGPORT}}
DB_DATABASE=${{Postgres.PGDATABASE}}
DB_USERNAME=${{Postgres.PGUSER}}
DB_PASSWORD=${{Postgres.PGPASSWORD}}
SESSION_DRIVER=database
CACHE_STORE=database
LOG_CHANNEL=single
QUEUE_CONNECTION=database
```

**Untuk APP_URL**:
- Tunggu deployment selesai
- Lihat URL aplikasi dari Railway (format: `https://cms-karangtaruna-production-xxxx.up.railway.app`)
- Tambah ke Variables:
```
APP_URL=https://cms-karangtaruna-production-xxxx.up.railway.app
```

---

## Step 5️⃣: Test Aplikasi

1. Klik **Public URL** di Railway untuk buka aplikasi
2. Test halaman bekerja dengan baik
3. Jika ada error, lihat logs di Railway Deployments tab

---

## ✅ Selesai!

Aplikasi Anda sekarang live di internet! 🎉

Untuk update berikutnya:
```powershell
git add .
git commit -m "Update kode"
git push origin test
# Railway otomatis re-deploy!
```

---

## 📁 File-File yang Sudah Dipersiapkan

Saya sudah membuat file-file ini untuk memudahkan deployment:

- ✅ **Procfile** - Instruksi untuk menjalankan aplikasi
- ✅ **railway.json** - Konfigurasi Railway
- ✅ **.railway/nixpacks.toml** - Build configuration
- ✅ **bin/heroku_release.sh** - Release script
- ✅ **DEPLOYMENT_RAILWAY.md** - Dokumentasi lengkap
- ✅ **DEPLOYMENT_CHECKLIST.md** - Checklist detail
- ✅ **DEPLOY_QUICK_START.md** - Panduan cepat (file ini)

---

## ❓ Troubleshooting Cepat

### Build Failed - Error Logs?
→ Lihat **Deployments** tab di Railway, klik deployment, lihat logs

### Database connection error?
→ Check variabel `DB_HOST`, `DB_PORT`, dll di Railway Variables

### Assets/CSS tidak loading?
→ Check bahwa `npm run build` berhasil di build logs

### Upload file tidak bisa?
→ Normal untuk free tier Railway. Setup S3 atau storage cloud lain.

---

## 📞 Butuh Bantuan?

- Railway Docs: https://docs.railway.app
- Laravel Docs: https://laravel.com/docs
- Railway Discord: https://discord.gg/railway

---

**Selamat! Sekarang giliran Anda untuk push dan deploy!** 🚀

Jika ada pertanyaan atau error, reference dokumentasi lengkap di `DEPLOYMENT_RAILWAY.md` atau checklist di `DEPLOYMENT_CHECKLIST.md`.
