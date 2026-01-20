<?php
/**
 * HOSTINGER SETUP SCRIPT
 * ======================
 * Script ini untuk setup awal di Hostinger shared hosting.
 * 
 * CARA PENGGUNAAN:
 * 1. Upload semua file ke public_html
 * 2. Akses: https://yourdomain.com/hostinger-setup.php
 * 3. Ikuti instruksi yang muncul
 * 4. HAPUS FILE INI SETELAH SELESAI!
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Hostinger Setup - Web Desa</title>";
echo "<style>
    body { font-family: 'Segoe UI', Arial, sans-serif; max-width: 900px; margin: 0 auto; padding: 20px; background: #f5f5f5; }
    .card { background: white; border-radius: 8px; padding: 20px; margin-bottom: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
    h1 { color: #1e3a8a; }
    h2 { color: #333; border-bottom: 2px solid #1e3a8a; padding-bottom: 10px; }
    .success { color: #166534; background: #dcfce7; padding: 10px; border-radius: 4px; }
    .error { color: #991b1b; background: #fee2e2; padding: 10px; border-radius: 4px; }
    .warning { color: #92400e; background: #fef3c7; padding: 10px; border-radius: 4px; }
    .info { color: #1e40af; background: #dbeafe; padding: 10px; border-radius: 4px; }
    pre { background: #1e293b; color: #e2e8f0; padding: 15px; border-radius: 4px; overflow-x: auto; }
    code { background: #e2e8f0; padding: 2px 6px; border-radius: 3px; color: #1e293b; }
    table { width: 100%; border-collapse: collapse; }
    th, td { padding: 10px; text-align: left; border-bottom: 1px solid #e5e7eb; }
    th { background: #f8fafc; }
    .btn { display: inline-block; padding: 10px 20px; background: #1e3a8a; color: white; text-decoration: none; border-radius: 4px; border: none; cursor: pointer; }
    .btn:hover { background: #1e40af; }
    .btn-danger { background: #dc2626; }
    .btn-danger:hover { background: #b91c1c; }
</style></head><body>";

echo "<h1>🏠 Hostinger Setup - Web Desa</h1>";

// Step 1: Check Environment
echo "<div class='card'>";
echo "<h2>1. Environment Check</h2>";

$checks = [
    'PHP Version' => [
        'value' => PHP_VERSION,
        'status' => version_compare(PHP_VERSION, '8.1.0', '>='),
        'required' => '8.1+'
    ],
    'Document Root' => [
        'value' => $_SERVER['DOCUMENT_ROOT'],
        'status' => true,
        'required' => '-'
    ],
    'Current Directory' => [
        'value' => __DIR__,
        'status' => true,
        'required' => '-'
    ],
];

// Check extensions
$requiredExtensions = ['pdo', 'pdo_mysql', 'mbstring', 'openssl', 'tokenizer', 'xml', 'ctype', 'json', 'fileinfo'];
foreach ($requiredExtensions as $ext) {
    $checks["Extension: $ext"] = [
        'value' => extension_loaded($ext) ? 'Loaded' : 'Not Loaded',
        'status' => extension_loaded($ext),
        'required' => 'Required'
    ];
}

echo "<table>";
echo "<tr><th>Item</th><th>Value</th><th>Required</th><th>Status</th></tr>";
foreach ($checks as $name => $check) {
    $statusIcon = $check['status'] ? '✅' : '❌';
    $statusClass = $check['status'] ? 'success' : 'error';
    echo "<tr><td>$name</td><td>{$check['value']}</td><td>{$check['required']}</td><td class='$statusClass'>$statusIcon</td></tr>";
}
echo "</table>";
echo "</div>";

// Step 2: Create Required Directories
echo "<div class='card'>";
echo "<h2>2. Create Required Directories</h2>";

$directories = [
    'storage/app/public',
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/logs',
    'bootstrap/cache',
    'public/images',
    'public/images/umkm',
];

echo "<table>";
echo "<tr><th>Directory</th><th>Status</th><th>Permission</th></tr>";

foreach ($directories as $dir) {
    $fullPath = __DIR__ . '/' . $dir;
    $exists = is_dir($fullPath);
    
    if (!$exists) {
        $created = @mkdir($fullPath, 0755, true);
        $status = $created ? '✅ Created' : '❌ Failed to create';
        $statusClass = $created ? 'success' : 'error';
    } else {
        $status = '✅ Exists';
        $statusClass = 'success';
    }
    
    // Check/set permission
    if (is_dir($fullPath)) {
        @chmod($fullPath, 0755);
        $perms = substr(sprintf('%o', fileperms($fullPath)), -4);
        $writable = is_writable($fullPath) ? '✅ Writable' : '❌ Not Writable';
    } else {
        $perms = '-';
        $writable = '-';
    }
    
    echo "<tr><td><code>$dir</code></td><td class='$statusClass'>$status</td><td>$perms ($writable)</td></tr>";
}
echo "</table>";
echo "</div>";

// Step 3: Create/Check .htaccess
echo "<div class='card'>";
echo "<h2>3. Check .htaccess</h2>";

$htaccessPath = __DIR__ . '/.htaccess';
$htaccessContent = <<<'HTACCESS'
<IfModule mod_rewrite.c>
    RewriteEngine On
    
    # Redirect to public folder
    RewriteCond %{REQUEST_URI} !^/public/
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ /public/$1 [L]
    
    # If directly accessing public folder
    RewriteCond %{REQUEST_URI} ^/public/
    RewriteRule ^public/(.*)$ /$1 [L,R=301]
</IfModule>
HTACCESS;

// Check if using subdirectory structure or direct public_html
$publicIndex = __DIR__ . '/public/index.php';
$rootIndex = __DIR__ . '/index.php';

if (file_exists($publicIndex) && !file_exists($rootIndex)) {
    // Standard Laravel structure - need .htaccess redirect
    if (!file_exists($htaccessPath)) {
        if (file_put_contents($htaccessPath, $htaccessContent)) {
            echo "<p class='success'>✅ Created .htaccess for redirect to /public</p>";
        } else {
            echo "<p class='error'>❌ Failed to create .htaccess</p>";
        }
    } else {
        echo "<p class='info'>ℹ️ .htaccess already exists</p>";
    }
    
    echo "<div class='warning'>";
    echo "<strong>⚠️ Untuk Hostinger:</strong><br>";
    echo "Jika redirect tidak bekerja, Anda perlu:<br>";
    echo "1. Set Document Root ke folder <code>public</code> di Hostinger panel, ATAU<br>";
    echo "2. Pindahkan isi folder <code>public</code> ke root dan update path di <code>index.php</code>";
    echo "</div>";
} else {
    echo "<p class='success'>✅ Structure looks correct</p>";
}
echo "</div>";

// Step 4: Check Images
echo "<div class='card'>";
echo "<h2>4. Check Images</h2>";

$imagesPath = __DIR__ . '/public/images';
if (!is_dir($imagesPath)) {
    $imagesPath = __DIR__ . '/images'; // Alternative path
}

$requiredImages = [
    'header-bg' => 'Header Background',
    'hero-1' => 'Hero Slide 1',
    'hero-2' => 'Hero Slide 2', 
    'hero-3' => 'Hero Slide 3',
    'struktur-organisasi' => 'Struktur Organisasi',
];

echo "<table>";
echo "<tr><th>Image</th><th>Description</th><th>Status</th></tr>";

foreach ($requiredImages as $baseName => $description) {
    $found = false;
    $foundFile = '';
    
    foreach (['jpg', 'jpeg', 'png', 'webp', 'gif'] as $ext) {
        if (file_exists($imagesPath . '/' . $baseName . '.' . $ext)) {
            $found = true;
            $foundFile = $baseName . '.' . $ext;
            break;
        }
    }
    
    $status = $found ? "✅ Found ($foundFile)" : "❌ Not Found";
    $statusClass = $found ? 'success' : 'error';
    echo "<tr><td><code>$baseName</code></td><td>$description</td><td class='$statusClass'>$status</td></tr>";
}
echo "</table>";

if (!is_writable($imagesPath)) {
    echo "<p class='error'>❌ Folder images tidak writable! Jalankan: <code>chmod -R 755 public/images</code></p>";
}
echo "</div>";

// Step 5: Test Database Connection
echo "<div class='card'>";
echo "<h2>5. Database Connection</h2>";

$envPath = __DIR__ . '/.env';
if (file_exists($envPath)) {
    $envContent = file_get_contents($envPath);
    preg_match('/DB_HOST=(.*)/', $envContent, $hostMatch);
    preg_match('/DB_DATABASE=(.*)/', $envContent, $dbMatch);
    preg_match('/DB_USERNAME=(.*)/', $envContent, $userMatch);
    preg_match('/DB_PASSWORD=(.*)/', $envContent, $passMatch);
    
    $dbHost = trim($hostMatch[1] ?? 'localhost');
    $dbName = trim($dbMatch[1] ?? '');
    $dbUser = trim($userMatch[1] ?? '');
    $dbPass = trim($passMatch[1] ?? '');
    
    echo "<p>Host: <code>$dbHost</code></p>";
    echo "<p>Database: <code>$dbName</code></p>";
    echo "<p>Username: <code>$dbUser</code></p>";
    
    if ($dbName && $dbUser) {
        try {
            $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<p class='success'>✅ Database connection successful!</p>";
            
            // Check tables
            $tables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);
            echo "<p>Tables found: " . count($tables) . "</p>";
            
            if (count($tables) == 0) {
                echo "<p class='warning'>⚠️ Database kosong. Jalankan migration: <code>php artisan migrate --seed</code></p>";
            }
        } catch (PDOException $e) {
            echo "<p class='error'>❌ Database connection failed: " . $e->getMessage() . "</p>";
        }
    } else {
        echo "<p class='warning'>⚠️ Database not configured in .env</p>";
    }
} else {
    echo "<p class='error'>❌ .env file not found!</p>";
    echo "<p>Copy <code>.env.example</code> to <code>.env</code> and configure it.</p>";
}
echo "</div>";

// Step 6: Artisan Commands
echo "<div class='card'>";
echo "<h2>6. Run Artisan Commands</h2>";
echo "<p>Jalankan command berikut via SSH atau Terminal di Hostinger:</p>";
echo "<pre>";
echo "# Clear all caches\n";
echo "php artisan config:clear\n";
echo "php artisan cache:clear\n";
echo "php artisan view:clear\n";
echo "php artisan route:clear\n\n";
echo "# Generate app key (jika belum)\n";
echo "php artisan key:generate\n\n";
echo "# Run migrations\n";
echo "php artisan migrate --seed\n\n";
echo "# Create storage link (opsional, jika pakai storage)\n";
echo "php artisan storage:link\n";
echo "</pre>";

// Try to run some commands via PHP
if (isset($_GET['run']) && $_GET['run'] === 'cache') {
    echo "<h3>Running cache clear...</h3>";
    
    // Clear Laravel caches manually
    $cachePaths = [
        __DIR__ . '/bootstrap/cache/config.php',
        __DIR__ . '/bootstrap/cache/routes-v7.php',
        __DIR__ . '/bootstrap/cache/services.php',
        __DIR__ . '/bootstrap/cache/packages.php',
    ];
    
    foreach ($cachePaths as $cachePath) {
        if (file_exists($cachePath)) {
            unlink($cachePath);
            echo "<p class='success'>Deleted: " . basename($cachePath) . "</p>";
        }
    }
    
    // Clear view cache
    $viewCachePath = __DIR__ . '/storage/framework/views';
    if (is_dir($viewCachePath)) {
        $files = glob($viewCachePath . '/*.php');
        foreach ($files as $file) {
            unlink($file);
        }
        echo "<p class='success'>Cleared " . count($files) . " view cache files</p>";
    }
    
    echo "<p class='success'>✅ Cache cleared!</p>";
}

echo "<a href='?run=cache' class='btn'>🗑️ Clear Cache Now</a>";
echo "</div>";

// Step 7: Final Checklist
echo "<div class='card'>";
echo "<h2>7. Final Checklist</h2>";
echo "<div class='info'>";
echo "<h3>Sebelum website live, pastikan:</h3>";
echo "<ol>";
echo "<li>✅ File <code>.env</code> sudah dikonfigurasi dengan benar</li>";
echo "<li>✅ Database sudah dibuat dan migration sudah dijalankan</li>";
echo "<li>✅ Folder <code>storage</code> dan <code>bootstrap/cache</code> writable</li>";
echo "<li>✅ Folder <code>public/images</code> writable untuk upload gambar</li>";
echo "<li>✅ APP_DEBUG=false di production</li>";
echo "<li>✅ APP_URL sesuai dengan domain</li>";
echo "<li>⚠️ <strong>HAPUS FILE INI</strong> setelah setup selesai!</li>";
echo "</ol>";
echo "</div>";
echo "</div>";

// Delete button
echo "<div class='card'>";
echo "<h2>⚠️ Hapus File Setup</h2>";
echo "<p>Setelah semua selesai, hapus file ini untuk keamanan:</p>";

if (isset($_GET['delete']) && $_GET['delete'] === 'yes') {
    if (unlink(__FILE__)) {
        echo "<p class='success'>✅ File berhasil dihapus!</p>";
        echo "<script>setTimeout(function(){ window.location.href = '/'; }, 2000);</script>";
        echo "<p>Redirecting to homepage...</p>";
    } else {
        echo "<p class='error'>❌ Gagal menghapus file. Hapus manual via FTP.</p>";
    }
} else {
    echo "<a href='?delete=yes' class='btn btn-danger' onclick=\"return confirm('Yakin ingin menghapus file setup ini?')\">🗑️ Hapus File Ini</a>";
}
echo "</div>";

echo "</body></html>";
?>
