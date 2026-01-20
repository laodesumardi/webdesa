<?php
/**
 * Script untuk mengecek dan memperbaiki masalah gambar di hosting
 * Akses via: https://yourdomain.com/check-images.php
 * HAPUS FILE INI SETELAH SELESAI DIGUNAKAN!
 */

echo "<h1>Image Checker - Web Desa</h1>";
echo "<style>body{font-family:Arial,sans-serif;padding:20px;} .success{color:green;} .error{color:red;} .warning{color:orange;} pre{background:#f5f5f5;padding:10px;overflow-x:auto;}</style>";

// 1. Cek path
echo "<h2>1. Path Information</h2>";
echo "<pre>";
echo "Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "\n";
echo "Script Path: " . __FILE__ . "\n";
echo "Public Path: " . realpath(__DIR__) . "\n";
echo "Images Path: " . realpath(__DIR__ . '/images') . "\n";
echo "</pre>";

// 2. Cek folder images
echo "<h2>2. Check Images Folder</h2>";
$imagesPath = __DIR__ . '/images';

if (file_exists($imagesPath)) {
    echo "<p class='success'>✓ Folder /images EXISTS</p>";
    
    // Cek permission
    $perms = substr(sprintf('%o', fileperms($imagesPath)), -4);
    echo "<p>Permission: $perms";
    if (is_writable($imagesPath)) {
        echo " <span class='success'>(Writable)</span>";
    } else {
        echo " <span class='error'>(NOT Writable - Upload will fail!)</span>";
    }
    echo "</p>";
    
    // List files
    echo "<h3>Files in /images:</h3>";
    echo "<ul>";
    $files = scandir($imagesPath);
    $imageCount = 0;
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            $filePath = $imagesPath . '/' . $file;
            $size = is_file($filePath) ? round(filesize($filePath) / 1024, 2) . ' KB' : 'DIR';
            echo "<li>$file ($size)</li>";
            if (is_file($filePath)) $imageCount++;
        }
    }
    echo "</ul>";
    echo "<p>Total image files: $imageCount</p>";
} else {
    echo "<p class='error'>✗ Folder /images NOT FOUND!</p>";
    echo "<p>Attempting to create folder...</p>";
    
    if (mkdir($imagesPath, 0755, true)) {
        echo "<p class='success'>✓ Folder created successfully!</p>";
    } else {
        echo "<p class='error'>✗ Failed to create folder. Check permissions.</p>";
    }
}

// 3. Cek gambar penting
echo "<h2>3. Check Required Images</h2>";
$requiredImages = [
    'header-bg' => ['jpg', 'jpeg', 'png', 'webp'],
    'hero-1' => ['jpg', 'jpeg', 'png', 'webp'],
    'hero-2' => ['jpg', 'jpeg', 'png', 'webp'],
    'hero-3' => ['jpg', 'jpeg', 'png', 'webp'],
    'struktur-organisasi' => ['jpg', 'jpeg', 'png', 'webp'],
];

echo "<table border='1' cellpadding='10' style='border-collapse:collapse;'>";
echo "<tr><th>Image</th><th>Status</th><th>URL</th></tr>";

foreach ($requiredImages as $baseName => $extensions) {
    $found = false;
    $foundFile = '';
    
    foreach ($extensions as $ext) {
        $testPath = $imagesPath . '/' . $baseName . '.' . $ext;
        if (file_exists($testPath)) {
            $found = true;
            $foundFile = $baseName . '.' . $ext;
            break;
        }
    }
    
    if ($found) {
        $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/images/$foundFile";
        echo "<tr><td>$baseName</td><td class='success'>✓ Found ($foundFile)</td><td><a href='$url' target='_blank'>View</a></td></tr>";
    } else {
        echo "<tr><td>$baseName</td><td class='error'>✗ Not Found</td><td>-</td></tr>";
    }
}
echo "</table>";

// 4. Cek database content untuk gambar
echo "<h2>4. Check Database Image References</h2>";
try {
    // Load Laravel
    require __DIR__ . '/vendor/autoload.php';
    $app = require_once __DIR__ . '/bootstrap/app.php';
    $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
    
    $contents = \App\Models\Content::whereIn('key', ['foto', 'gambar', 'struktur'])
        ->orWhere('content', 'like', '%images/%')
        ->get();
    
    if ($contents->count() > 0) {
        echo "<table border='1' cellpadding='10' style='border-collapse:collapse;'>";
        echo "<tr><th>Page</th><th>Section</th><th>Key</th><th>Content</th><th>File Exists?</th></tr>";
        
        foreach ($contents as $content) {
            $filePath = __DIR__ . '/' . $content->content;
            $exists = file_exists($filePath);
            $statusClass = $exists ? 'success' : 'error';
            $statusText = $exists ? '✓ Yes' : '✗ No';
            
            echo "<tr>";
            echo "<td>{$content->page}</td>";
            echo "<td>{$content->section}</td>";
            echo "<td>{$content->key}</td>";
            echo "<td>{$content->content}</td>";
            echo "<td class='$statusClass'>$statusText</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No image references found in database.</p>";
    }
} catch (Exception $e) {
    echo "<p class='warning'>Could not check database: " . $e->getMessage() . "</p>";
}

// 5. Test upload
echo "<h2>5. Test Upload Capability</h2>";
$testFile = $imagesPath . '/test-write-' . time() . '.txt';
if (@file_put_contents($testFile, 'test')) {
    echo "<p class='success'>✓ Write test PASSED - Uploads should work</p>";
    unlink($testFile);
} else {
    echo "<p class='error'>✗ Write test FAILED - Uploads will NOT work!</p>";
    echo "<p>Solution: Set folder permission to 755 or 775</p>";
    echo "<pre>chmod -R 755 public/images</pre>";
}

// 6. Solusi
echo "<h2>6. Solutions</h2>";
echo "<div style='background:#fffbcc;padding:15px;border:1px solid #e6db55;'>";
echo "<p><strong>Jika gambar tidak muncul setelah upload:</strong></p>";
echo "<ol>";
echo "<li><strong>Cek permission folder:</strong> Pastikan folder <code>public/images</code> memiliki permission 755 atau 775</li>";
echo "<li><strong>Upload manual via FTP/File Manager:</strong> Upload gambar langsung ke folder <code>public/images</code></li>";
echo "<li><strong>Clear cache:</strong> Jalankan <code>php artisan cache:clear</code> dan <code>php artisan view:clear</code></li>";
echo "<li><strong>Cek .htaccess:</strong> Pastikan tidak ada rule yang memblokir akses ke folder images</li>";
echo "<li><strong>Cek storage link:</strong> Jika menggunakan storage, jalankan <code>php artisan storage:link</code></li>";
echo "</ol>";
echo "</div>";

echo "<hr>";
echo "<p style='color:red;'><strong>⚠️ HAPUS FILE INI SETELAH SELESAI DIGUNAKAN!</strong></p>";
?>
