<?php
/**
 * Script untuk check dan update konfigurasi .env
 * Hapus file ini setelah selesai digunakan
 */

// Baca file .env
$envFile = __DIR__ . '/.env';

if (!file_exists($envFile)) {
    die("Error: File .env tidak ditemukan!<br>Pastikan file .env sudah ada di root project.");
}

$envContent = file_get_contents($envFile);

echo "<h2>Konfigurasi Database Saat Ini:</h2>";
echo "<pre style='background: #f5f5f5; padding: 15px; border-radius: 5px;'>";

// Extract database config
preg_match('/DB_CONNECTION=(.*)/', $envContent, $connection);
preg_match('/DB_HOST=(.*)/', $envContent, $host);
preg_match('/DB_PORT=(.*)/', $envContent, $port);
preg_match('/DB_DATABASE=(.*)/', $envContent, $database);
preg_match('/DB_USERNAME=(.*)/', $envContent, $username);
preg_match('/DB_PASSWORD=(.*)/', $envContent, $password);

echo "DB_CONNECTION = " . (isset($connection[1]) ? trim($connection[1]) : 'TIDAK ADA') . "\n";
echo "DB_HOST = " . (isset($host[1]) ? trim($host[1]) : 'TIDAK ADA') . "\n";
echo "DB_PORT = " . (isset($port[1]) ? trim($port[1]) : 'TIDAK ADA') . "\n";
echo "DB_DATABASE = " . (isset($database[1]) ? trim($database[1]) : 'TIDAK ADA') . "\n";
echo "DB_USERNAME = " . (isset($username[1]) ? trim($username[1]) : 'TIDAK ADA') . "\n";
echo "DB_PASSWORD = " . (isset($password[1]) ? (strlen(trim($password[1])) > 0 ? '***' : 'KOSONG') : 'TIDAK ADA') . "\n";

echo "</pre>";

// Test connection
echo "<h2>Test Koneksi Database:</h2>";

try {
    require __DIR__.'/vendor/autoload.php';
    $app = require_once __DIR__.'/bootstrap/app.php';
    $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
    
    $pdo = DB::connection()->getPdo();
    echo "<p style='color: green; font-weight: bold;'>✓ Koneksi database BERHASIL!</p>";
    echo "<p>Database: " . DB::connection()->getDatabaseName() . "</p>";
} catch (Exception $e) {
    echo "<p style='color: red; font-weight: bold;'>✗ Koneksi database GAGAL!</p>";
    echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
    echo "<hr>";
    echo "<h3>Solusi:</h3>";
    echo "<ol>";
    echo "<li>Buka file <code>.env</code> di root project</li>";
    echo "<li>Update konfigurasi database dengan kredensial yang benar dari hosting provider:</li>";
    echo "<pre style='background: #f5f5f5; padding: 15px; border-radius: 5px;'>";
    echo "DB_CONNECTION=mysql\n";
    echo "DB_HOST=127.0.0.1\n";
    echo "DB_PORT=3306\n";
    echo "DB_DATABASE=nama_database_dari_hosting\n";
    echo "DB_USERNAME=username_dari_hosting\n";
    echo "DB_PASSWORD=password_dari_hosting\n";
    echo "</pre>";
    echo "<li>Setelah update, refresh halaman ini untuk test ulang</li>";
    echo "<li>Jika berhasil, jalankan: <code>php artisan config:clear</code> dan <code>php artisan cache:clear</code></li>";
    echo "</ol>";
}

echo "<hr>";
echo "<p><small>Hapus file ini setelah selesai untuk keamanan.</small></p>";
