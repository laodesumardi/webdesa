<?php
/**
 * Diagnostic Script untuk Hostinger
 * Akses via: https://domain-anda.com/diagnose.php
 * HAPUS FILE INI SETELAH SELESAI DIGUNAKAN!
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<html><head><title>Diagnostic - Web Desa</title>";
echo "<style>
body { font-family: Arial, sans-serif; max-width: 1200px; margin: 20px auto; padding: 20px; background: #f5f5f5; }
.card { background: white; border-radius: 8px; padding: 20px; margin-bottom: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
h1 { color: #1e3a8a; }
h2 { color: #333; border-bottom: 2px solid #1e3a8a; padding-bottom: 10px; }
.success { color: #059669; background: #d1fae5; padding: 8px 12px; border-radius: 4px; margin: 5px 0; }
.error { color: #dc2626; background: #fee2e2; padding: 8px 12px; border-radius: 4px; margin: 5px 0; }
.warning { color: #d97706; background: #fef3c7; padding: 8px 12px; border-radius: 4px; margin: 5px 0; }
.info { color: #2563eb; background: #dbeafe; padding: 8px 12px; border-radius: 4px; margin: 5px 0; }
table { width: 100%; border-collapse: collapse; margin: 10px 0; }
th, td { padding: 10px; text-align: left; border: 1px solid #ddd; }
th { background: #1e3a8a; color: white; }
tr:nth-child(even) { background: #f9f9f9; }
img.thumb { max-width: 80px; max-height: 80px; object-fit: cover; border-radius: 4px; }
.btn { display: inline-block; padding: 10px 20px; background: #1e3a8a; color: white; text-decoration: none; border-radius: 4px; margin: 5px; }
.btn:hover { background: #1e40af; }
.btn-danger { background: #dc2626; }
.btn-danger:hover { background: #b91c1c; }
</style></head><body>";

echo "<h1>🔍 Diagnostic Tool - Web Desa Hostinger</h1>";

// 1. Server Info
echo "<div class='card'>";
echo "<h2>1. Server Information</h2>";
echo "<table>";
echo "<tr><th>Item</th><th>Value</th></tr>";
echo "<tr><td>PHP Version</td><td>" . phpversion() . "</td></tr>";
echo "<tr><td>Server Software</td><td>" . ($_SERVER['SERVER_SOFTWARE'] ?? 'N/A') . "</td></tr>";
echo "<tr><td>Document Root</td><td>" . $_SERVER['DOCUMENT_ROOT'] . "</td></tr>";
echo "<tr><td>Script Path</td><td>" . __FILE__ . "</td></tr>";
echo "<tr><td>Current Directory</td><td>" . getcwd() . "</td></tr>";
echo "</table>";
echo "</div>";

// 2. Directory Structure
echo "<div class='card'>";
echo "<h2>2. Directory Structure Check</h2>";

$directories = [
    'images' => $_SERVER['DOCUMENT_ROOT'] . '/images',
    'images/berita' => $_SERVER['DOCUMENT_ROOT'] . '/images/berita',
    'images/galeri' => $_SERVER['DOCUMENT_ROOT'] . '/images/galeri',
    'images/umkm' => $_SERVER['DOCUMENT_ROOT'] . '/images/umkm',
    'uploads' => $_SERVER['DOCUMENT_ROOT'] . '/uploads',
    'uploads/pengaduan' => $_SERVER['DOCUMENT_ROOT'] . '/uploads/pengaduan',
];

echo "<table>";
echo "<tr><th>Directory</th><th>Exists</th><th>Writable</th><th>Permissions</th><th>Action</th></tr>";

foreach ($directories as $name => $path) {
    $exists = is_dir($path);
    $writable = $exists ? is_writable($path) : false;
    $perms = $exists ? substr(sprintf('%o', fileperms($path)), -4) : 'N/A';
    
    $existsClass = $exists ? 'success' : 'error';
    $writableClass = $writable ? 'success' : 'error';
    
    echo "<tr>";
    echo "<td><strong>{$name}</strong><br><small>{$path}</small></td>";
    echo "<td class='{$existsClass}'>" . ($exists ? '✓ Yes' : '✗ No') . "</td>";
    echo "<td class='{$writableClass}'>" . ($writable ? '✓ Yes' : '✗ No') . "</td>";
    echo "<td>{$perms}</td>";
    echo "<td>";
    if (!$exists) {
        echo "<a href='?action=create_dir&path=" . urlencode($path) . "' class='btn'>Create</a>";
    }
    echo "</td>";
    echo "</tr>";
}
echo "</table>";
echo "</div>";

// 3. Image Files Check
echo "<div class='card'>";
echo "<h2>3. Image Files in /images/</h2>";

$imageDir = $_SERVER['DOCUMENT_ROOT'] . '/images';
if (is_dir($imageDir)) {
    $files = scandir($imageDir);
    $imageFiles = array_filter($files, function($f) use ($imageDir) {
        return is_file($imageDir . '/' . $f) && preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $f);
    });
    
    if (count($imageFiles) > 0) {
        echo "<p class='success'>Found " . count($imageFiles) . " image(s) in /images/</p>";
        echo "<table>";
        echo "<tr><th>Preview</th><th>Filename</th><th>Size</th><th>Permissions</th></tr>";
        foreach ($imageFiles as $file) {
            $filepath = $imageDir . '/' . $file;
            $size = filesize($filepath);
            $perms = substr(sprintf('%o', fileperms($filepath)), -4);
            $sizeKB = round($size / 1024, 2);
            echo "<tr>";
            echo "<td><img src='/images/{$file}' class='thumb' onerror=\"this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2280%22 height=%2280%22%3E%3Crect fill=%22%23ddd%22 width=%22100%25%22 height=%22100%25%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 dy=%22.3em%22%3EError%3C/text%3E%3C/svg%3E'\"></td>";
            echo "<td>{$file}</td>";
            echo "<td>{$sizeKB} KB</td>";
            echo "<td>{$perms}</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='warning'>No image files found in /images/</p>";
    }
} else {
    echo "<p class='error'>/images/ directory does not exist!</p>";
}
echo "</div>";

// 4. Subdirectories Check
$subdirs = ['berita', 'galeri', 'umkm'];
foreach ($subdirs as $subdir) {
    echo "<div class='card'>";
    echo "<h2>4.{$subdir}. Images in /images/{$subdir}/</h2>";
    
    $subPath = $_SERVER['DOCUMENT_ROOT'] . '/images/' . $subdir;
    if (is_dir($subPath)) {
        $files = scandir($subPath);
        $imageFiles = array_filter($files, function($f) use ($subPath) {
            return is_file($subPath . '/' . $f) && preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $f);
        });
        
        if (count($imageFiles) > 0) {
            echo "<p class='success'>Found " . count($imageFiles) . " image(s)</p>";
            echo "<table>";
            echo "<tr><th>Preview</th><th>Filename</th><th>Size</th></tr>";
            foreach ($imageFiles as $file) {
                $filepath = $subPath . '/' . $file;
                $size = round(filesize($filepath) / 1024, 2);
                echo "<tr>";
                echo "<td><img src='/images/{$subdir}/{$file}' class='thumb' onerror=\"this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2280%22 height=%2280%22%3E%3Crect fill=%22%23ddd%22 width=%22100%25%22 height=%22100%25%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 text-anchor=%22middle%22 dy=%22.3em%22%3EError%3C/text%3E%3C/svg%3E'\"></td>";
                echo "<td>{$file}</td>";
                echo "<td>{$size} KB</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p class='warning'>No images found</p>";
        }
    } else {
        echo "<p class='error'>Directory does not exist</p>";
    }
    echo "</div>";
}

// 5. Database Check
echo "<div class='card'>";
echo "<h2>5. Database Connection</h2>";

// Try to load Laravel bootstrap
$laravelBootstrap = $_SERVER['DOCUMENT_ROOT'] . '/../bootstrap/app.php';
$altBootstrap = dirname($_SERVER['DOCUMENT_ROOT']) . '/bootstrap/app.php';

if (file_exists($laravelBootstrap)) {
    echo "<p class='info'>Laravel bootstrap found at: {$laravelBootstrap}</p>";
} elseif (file_exists($altBootstrap)) {
    echo "<p class='info'>Laravel bootstrap found at: {$altBootstrap}</p>";
} else {
    echo "<p class='warning'>Laravel bootstrap not found in expected locations</p>";
}

// Check .env
$envPath = $_SERVER['DOCUMENT_ROOT'] . '/../.env';
$altEnvPath = dirname($_SERVER['DOCUMENT_ROOT']) . '/.env';

if (file_exists($envPath) || file_exists($altEnvPath)) {
    echo "<p class='success'>.env file exists</p>";
} else {
    echo "<p class='error'>.env file not found!</p>";
}
echo "</div>";

// 6. Quick Actions
echo "<div class='card'>";
echo "<h2>6. Quick Actions</h2>";

// Handle actions
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    
    if ($action === 'create_dir' && isset($_GET['path'])) {
        $path = $_GET['path'];
        if (!is_dir($path)) {
            if (mkdir($path, 0755, true)) {
                echo "<p class='success'>Directory created: {$path}</p>";
            } else {
                echo "<p class='error'>Failed to create directory: {$path}</p>";
            }
        }
    }
    
    if ($action === 'fix_permissions') {
        $dirs = [$imageDir, $imageDir . '/berita', $imageDir . '/galeri', $imageDir . '/umkm'];
        foreach ($dirs as $dir) {
            if (is_dir($dir)) {
                chmod($dir, 0755);
                echo "<p class='info'>Set permissions 755 on: {$dir}</p>";
            }
        }
    }
    
    if ($action === 'clear_cache') {
        // Clear Laravel cache files
        $cacheDirs = [
            dirname($_SERVER['DOCUMENT_ROOT']) . '/bootstrap/cache',
            dirname($_SERVER['DOCUMENT_ROOT']) . '/storage/framework/cache',
            dirname($_SERVER['DOCUMENT_ROOT']) . '/storage/framework/views',
        ];
        foreach ($cacheDirs as $cacheDir) {
            if (is_dir($cacheDir)) {
                $files = glob($cacheDir . '/*.php');
                foreach ($files as $file) {
                    if (is_file($file)) {
                        unlink($file);
                    }
                }
                echo "<p class='info'>Cleared cache in: {$cacheDir}</p>";
            }
        }
    }
}

echo "<p>
    <a href='?action=fix_permissions' class='btn'>Fix Permissions (755)</a>
    <a href='?action=clear_cache' class='btn'>Clear Laravel Cache</a>
    <a href='?' class='btn'>Refresh</a>
</p>";
echo "</div>";

// 7. Upload Test
echo "<div class='card'>";
echo "<h2>7. Test Upload</h2>";

if (isset($_POST['test_upload']) && isset($_FILES['test_image'])) {
    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/images/';
    $filename = 'test-upload-' . time() . '.jpg';
    $targetPath = $uploadDir . $filename;
    
    if (move_uploaded_file($_FILES['test_image']['tmp_name'], $targetPath)) {
        echo "<p class='success'>Upload successful! File: /images/{$filename}</p>";
        echo "<img src='/images/{$filename}' style='max-width: 200px; margin: 10px 0;'>";
        echo "<br><a href='?action=delete_test&file=" . urlencode($filename) . "' class='btn btn-danger'>Delete Test File</a>";
    } else {
        echo "<p class='error'>Upload failed! Check directory permissions.</p>";
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'delete_test' && isset($_GET['file'])) {
    $file = $_SERVER['DOCUMENT_ROOT'] . '/images/' . basename($_GET['file']);
    if (file_exists($file) && strpos(basename($_GET['file']), 'test-upload-') === 0) {
        unlink($file);
        echo "<p class='success'>Test file deleted</p>";
    }
}

echo "<form method='POST' enctype='multipart/form-data'>";
echo "<input type='file' name='test_image' accept='image/*' required>";
echo "<button type='submit' name='test_upload' class='btn'>Test Upload</button>";
echo "</form>";
echo "</div>";

// 8. Recommendations
echo "<div class='card'>";
echo "<h2>8. Recommendations</h2>";
echo "<ul>";
echo "<li><strong>Jika gambar tidak muncul:</strong> Pastikan file gambar sudah di-upload via Git atau FTP</li>";
echo "<li><strong>Jika upload gagal:</strong> Ubah permission folder /images/ ke 755 atau 775</li>";
echo "<li><strong>Jika masih error:</strong> Hubungi support Hostinger untuk mengecek konfigurasi server</li>";
echo "<li><strong>PENTING:</strong> Hapus file diagnose.php ini setelah selesai digunakan!</li>";
echo "</ul>";
echo "</div>";

echo "<p style='text-align:center; color:#666; margin-top:20px;'>⚠️ DELETE THIS FILE AFTER USE FOR SECURITY!</p>";
echo "</body></html>";
