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

## Masalah: Gambar Hero Section Tidak Muncul

Jika gambar di hero section tidak muncul di hosting, ikuti langkah berikut:

### Solusi 1: Upload Gambar ke Server

1. Siapkan 3 gambar dengan nama:
   - `hero-1.jpg` (untuk slide pertama)
   - `hero-2.jpg` (untuk slide kedua)
   - `hero-3.jpg` (untuk slide ketiga)

2. Upload gambar ke folder `public/images/` di server:
   ```
   public_html/public/images/hero-1.jpg
   public_html/public/images/hero-2.jpg
   public_html/public/images/hero-3.jpg
   ```

3. Set permission gambar:
   ```bash
   chmod 644 public/images/hero-*.jpg
   ```

### Solusi 2: Pastikan Folder Images Ada

Pastikan folder `public/images/` ada di server:
```bash
mkdir -p public/images
chmod 755 public/images
```

### Solusi 3: Cek Path Gambar

Jika gambar masih tidak muncul:
1. Buka browser developer tools (F12)
2. Cek tab Network untuk melihat error loading gambar
3. Pastikan URL gambar benar (contoh: `https://desa.odetune.shop/images/hero-1.jpg`)

### Catatan

- Jika gambar tidak ditemukan, sistem akan menggunakan fallback dari Unsplash
- Pastikan hosting Anda mengizinkan akses ke URL external (Unsplash)
- Ukuran gambar disarankan: 1920x600px, format JPG, maksimal 500KB per gambar

## Troubleshooting

Jika masih error setelah build:
1. Pastikan folder `public/build` ada dan memiliki permission yang benar
2. Pastikan file `manifest.json` ada di `public/build/manifest.json`
3. Clear cache Laravel: `php artisan cache:clear`
4. Clear config cache: `php artisan config:clear`
5. Pastikan folder `public/images` ada dan gambar hero sudah di-upload
