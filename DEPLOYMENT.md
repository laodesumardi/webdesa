# Panduan Deployment Website Desa

## Masalah: Vite Manifest Not Found

Error ini terjadi karena file `public/build/manifest.json` tidak ditemukan di server production.

## Solusi 1: Build di Server Production (Recommended)

Setelah upload semua file ke server, jalankan perintah berikut di server:

```bash
# Masuk ke direktori project
cd /home/u798974089/domains/desa.odetune.shop/public_html

# Install dependencies (jika belum)
npm install

# Build assets untuk production
npm run build
```

Pastikan Node.js dan npm sudah terinstall di server.

## Solusi 2: Build Lokal dan Upload

1. Build assets di local:
```bash
npm run build
```

2. Upload folder `public/build` ke server:
   - Upload seluruh isi folder `public/build` ke `public_html/public/build/` di server

## Solusi 3: Menggunakan Fallback (Sudah Diterapkan)

File `resources/views/layouts/app.blade.php` sudah memiliki fallback. Jika manifest tidak ditemukan, akan menggunakan asset langsung.

Namun, untuk production yang optimal, gunakan Solusi 1 atau 2.

## Checklist Deployment

- [ ] Upload semua file ke server
- [ ] Set permission folder storage dan cache
- [ ] Copy `.env.example` ke `.env` dan konfigurasi
- [ ] Run `composer install --no-dev --optimize-autoloader`
- [ ] Run `php artisan key:generate`
- [ ] Run `php artisan config:cache`
- [ ] Run `php artisan route:cache`
- [ ] Run `php artisan view:cache`
- [ ] Run `npm install` (jika belum)
- [ ] Run `npm run build`
- [ ] Set permission folder `public/build` (755 atau 644)
- [ ] Test website di browser

## Troubleshooting

Jika masih error setelah build:
1. Pastikan folder `public/build` ada dan memiliki permission yang benar
2. Pastikan file `manifest.json` ada di `public/build/manifest.json`
3. Clear cache Laravel: `php artisan cache:clear`
4. Clear config cache: `php artisan config:clear`
