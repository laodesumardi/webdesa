# Panduan Deployment ke Hosting

## Konfigurasi Database di Server Hosting

### 1. Update File .env di Server

Setelah upload file ke server hosting, pastikan file `.env` di server memiliki konfigurasi database yang benar:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_dari_hosting
DB_USERNAME=username_dari_hosting
DB_PASSWORD=password_dari_hosting
```

**Penting**: Ganti dengan kredensial database yang diberikan oleh hosting provider Anda.

### 2. Clear Cache Setelah Update .env

Setelah mengupdate file `.env`, jalankan perintah berikut di server hosting (via SSH atau terminal hosting):

```bash
php artisan config:clear
php artisan cache:clear
php artisan config:cache
php artisan optimize:clear
```

### 3. Jalankan Migration

Setelah konfigurasi database benar, jalankan migration:

```bash
php artisan migrate
```

### 4. Buat Folder Storage (PENTING!)

**Masalah**: Error "The storage\framework/sessions directory does not exist"

**Solusi**: Pastikan semua folder storage sudah dibuat di server hosting. Buat folder berikut:

```
storage/framework/sessions
storage/framework/views
storage/framework/cache
storage/framework/cache/data
storage/framework/testing
storage/logs
storage/app/public
```

**Cara membuat folder:**

**Via SSH:**
```bash
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/framework/cache/data
mkdir -p storage/framework/testing
mkdir -p storage/logs
mkdir -p storage/app/public
```

**Via cPanel File Manager:**
1. Buka File Manager di cPanel
2. Navigasi ke folder `storage/framework`
3. Buat folder `sessions`, `views`, `cache`, `testing`
4. Di dalam folder `cache`, buat folder `data`
5. Pastikan folder `storage/logs` dan `storage/app/public` juga ada

**Via PHP Script (jika tidak bisa SSH):**

Buat file `create-storage.php` di root project:

```php
<?php
// create-storage.php (hapus setelah selesai)
$folders = [
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/framework/cache/data',
    'storage/framework/testing',
    'storage/logs',
    'storage/app/public',
];

foreach ($folders as $folder) {
    if (!is_dir($folder)) {
        mkdir($folder, 0755, true);
        echo "Created: $folder<br>";
    } else {
        echo "Exists: $folder<br>";
    }
}

echo "Done!";
```

Akses via browser: `https://desa.odetune.shop/create-storage.php` (hapus file setelah selesai)

### 5. Set Permission (Jika Diperlukan)

Pastikan folder storage dan bootstrap/cache memiliki permission yang benar:

**Via SSH:**
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

**Via cPanel File Manager:**
1. Pilih folder `storage` dan `bootstrap/cache`
2. Klik kanan → Change Permissions
3. Set ke `775` (atau `755` jika `775` tidak bisa)

### 6. Troubleshooting

Jika masih error "Access denied for user 'desa'":
1. Pastikan file `.env` di server sudah diupdate dengan kredensial yang benar
2. Clear semua cache: `php artisan optimize:clear`
3. Rebuild config cache: `php artisan config:cache`
4. Restart web server (jika menggunakan Apache/Nginx)
5. Pastikan kredensial database di `.env` sesuai dengan yang diberikan hosting provider

### 7. Verifikasi Koneksi Database

Untuk test koneksi database, buat file test sementara:

```php
<?php
// test-db.php (hapus setelah testing)
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

try {
    DB::connection()->getPdo();
    echo "Database connection OK!";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
```

Akses via browser: `https://desa.odetune.shop/test-db.php` (hapus file setelah testing)
