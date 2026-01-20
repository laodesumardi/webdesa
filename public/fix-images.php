<?php
/**
 * FIX IMAGES SCRIPT untuk Hostinger
 * ==================================
 * Script ini untuk memperbaiki masalah gambar di hosting.
 * 
 * Akses: https://yourdomain.com/fix-images.php
 * HAPUS FILE INI SETELAH SELESAI!
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Fix Images - Web Desa</title>";
echo "<style>
    body { font-family: Arial, sans-serif; max-width: 900px; margin: 0 auto; padding: 20px; background: #f5f5f5; }
    .card { background: white; border-radius: 8px; padding: 20px; margin-bottom: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
    h1 { color: #1e3a8a; }
    .success { color: green; background: #d4edda; padding: 10px; border-radius: 4px; margin: 5px 0; }
    .error { color: red; background: #f8d7da; padding: 10px; border-radius: 4px; margin: 5px 0; }
    .warning { color: #856404; background: #fff3cd; padding: 10px; border-radius: 4px; margin: 5px 0; }
    .info { color: #0c5460; background: #d1ecf1; padding: 10px; border-radius: 4px; margin: 5px 0; }
    pre { background: #1e293b; color: #e2e8f0; padding: 15px; border-radius: 4px; overflow-x: auto; font-size: 12px; }
    table { width: 100%; border-collapse: collapse; margin: 10px 0; }
    th, td { padding: 10px; text-align: left; border: 1px solid #ddd; }
    th { background: #1e3a8a; color: white; }
    .btn { display: inline-block; padding: 10px 20px; background: #1e3a8a; color: white; text-decoration: none; border-radius: 4px; border: none; cursor: pointer; margin: 5px; }
    .btn:hover { background: #1e40af; }
    .btn-success { background: #28a745; }
    .btn-danger { background: #dc3545; }
    input[type=file] { margin: 10px 0; }
</style></head><body>";

echo "<h1>🔧 Fix Images - Web Desa</h1>";

// Determine the correct images path
$possiblePaths = [
    __DIR__ . '/images',                    // Standard: public/images (when accessed from public folder)
    dirname(__DIR__) . '/public/images',    // From root: project/public/images
    $_SERVER['DOCUMENT_ROOT'] . '/images',  // Document root/images
    $_SERVER['DOCUMENT_ROOT'] . '/public/images', // Document root/public/images
];

$imagesPath = null;
$pathInfo = [];

foreach ($possiblePaths as $path) {
    $exists = is_dir($path);
    $writable = $exists ? is_writable($path) : false;
    $pathInfo[] = [
        'path' => $path,
        'exists' => $exists,
        'writable' => $writable
    ];
    
    if ($exists && $writable && $imagesPath === null) {
        $imagesPath = $path;
    }
}

// If no writable path found, try to create one
if ($imagesPath === null) {
    $tryPath = __DIR__ . '/images';
    if (@mkdir($tryPath, 0755, true)) {
        $imagesPath = $tryPath;
    }
}

// Section 1: Path Information
echo "<div class='card'>";
echo "<h2>1. Path Information</h2>";
echo "<table>";
echo "<tr><th>Path</th><th>Exists</th><th>Writable</th><th>Status</th></tr>";
foreach ($pathInfo as $info) {
    $existsIcon = $info['exists'] ? '✅' : '❌';
    $writableIcon = $info['writable'] ? '✅' : '❌';
    $status = ($info['path'] === $imagesPath) ? '<strong>✅ USING THIS</strong>' : '-';
    echo "<tr><td><code>{$info['path']}</code></td><td>{$existsIcon}</td><td>{$writableIcon}</td><td>{$status}</td></tr>";
}
echo "</table>";

echo "<p><strong>Document Root:</strong> <code>{$_SERVER['DOCUMENT_ROOT']}</code></p>";
echo "<p><strong>Current Script:</strong> <code>" . __FILE__ . "</code></p>";
echo "<p><strong>Selected Images Path:</strong> <code>" . ($imagesPath ?? 'NONE') . "</code></p>";

if ($imagesPath === null) {
    echo "<div class='error'>❌ Tidak ada folder images yang bisa digunakan! Buat folder manual via File Manager.</div>";
}
echo "</div>";

// Section 2: Check Existing Images
echo "<div class='card'>";
echo "<h2>2. Existing Images</h2>";

if ($imagesPath && is_dir($imagesPath)) {
    $files = scandir($imagesPath);
    $imageFiles = [];
    
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..' && is_file($imagesPath . '/' . $file)) {
            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                $imageFiles[] = $file;
            }
        }
    }
    
    if (count($imageFiles) > 0) {
        echo "<table>";
        echo "<tr><th>Filename</th><th>Size</th><th>Preview</th><th>URL</th></tr>";
        foreach ($imageFiles as $file) {
            $size = round(filesize($imagesPath . '/' . $file) / 1024, 2) . ' KB';
            $url = '/images/' . $file . '?t=' . time();
            echo "<tr>";
            echo "<td><code>$file</code></td>";
            echo "<td>$size</td>";
            echo "<td><img src='$url' style='max-width:100px;max-height:60px;'></td>";
            echo "<td><a href='$url' target='_blank'>View</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<div class='success'>✅ Ditemukan " . count($imageFiles) . " gambar</div>";
    } else {
        echo "<div class='warning'>⚠️ Tidak ada gambar di folder images</div>";
    }
} else {
    echo "<div class='error'>❌ Folder images tidak ditemukan</div>";
}
echo "</div>";

// Section 3: Required Images Check
echo "<div class='card'>";
echo "<h2>3. Required Images</h2>";

$requiredImages = [
    'header-bg' => 'Background header website',
    'hero-1' => 'Hero slider gambar 1',
    'hero-2' => 'Hero slider gambar 2',
    'hero-3' => 'Hero slider gambar 3',
    'struktur-organisasi' => 'Gambar struktur organisasi',
];

echo "<table>";
echo "<tr><th>Image</th><th>Description</th><th>Status</th></tr>";

foreach ($requiredImages as $name => $desc) {
    $found = false;
    $foundFile = '';
    
    if ($imagesPath) {
        foreach (['jpg', 'jpeg', 'png', 'webp', 'gif'] as $ext) {
            if (file_exists($imagesPath . '/' . $name . '.' . $ext)) {
                $found = true;
                $foundFile = $name . '.' . $ext;
                break;
            }
        }
    }
    
    $status = $found ? "<span class='success'>✅ Found ($foundFile)</span>" : "<span class='error'>❌ Not Found</span>";
    echo "<tr><td><code>$name</code></td><td>$desc</td><td>$status</td></tr>";
}
echo "</table>";
echo "</div>";

// Section 4: Upload Test
echo "<div class='card'>";
echo "<h2>4. Upload Test</h2>";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['test_image'])) {
    $uploadedFile = $_FILES['test_image'];
    
    if ($uploadedFile['error'] === UPLOAD_ERR_OK) {
        $targetName = $_POST['target_name'] ?? 'test-upload';
        $ext = strtolower(pathinfo($uploadedFile['name'], PATHINFO_EXTENSION));
        $targetFile = $imagesPath . '/' . $targetName . '.' . $ext;
        
        // Delete old file with same name but different extension
        foreach (['jpg', 'jpeg', 'png', 'webp', 'gif'] as $oldExt) {
            $oldFile = $imagesPath . '/' . $targetName . '.' . $oldExt;
            if (file_exists($oldFile)) {
                @unlink($oldFile);
            }
        }
        
        if (move_uploaded_file($uploadedFile['tmp_name'], $targetFile)) {
            echo "<div class='success'>✅ Upload berhasil! File: <code>$targetName.$ext</code></div>";
            echo "<p>Preview: <img src='/images/$targetName.$ext?t=" . time() . "' style='max-width:300px;'></p>";
        } else {
            echo "<div class='error'>❌ Gagal menyimpan file. Cek permission folder.</div>";
        }
    } else {
        $errors = [
            UPLOAD_ERR_INI_SIZE => 'File terlalu besar (php.ini)',
            UPLOAD_ERR_FORM_SIZE => 'File terlalu besar (form)',
            UPLOAD_ERR_PARTIAL => 'File hanya terupload sebagian',
            UPLOAD_ERR_NO_FILE => 'Tidak ada file yang diupload',
        ];
        $errMsg = $errors[$uploadedFile['error']] ?? 'Unknown error';
        echo "<div class='error'>❌ Upload error: $errMsg</div>";
    }
}

echo "<form method='POST' enctype='multipart/form-data'>";
echo "<p><strong>Upload gambar langsung ke server:</strong></p>";
echo "<p><label>Nama file (tanpa ekstensi):</label><br>";
echo "<select name='target_name' style='padding:8px;width:200px;'>";
echo "<option value='header-bg'>header-bg</option>";
echo "<option value='hero-1'>hero-1</option>";
echo "<option value='hero-2'>hero-2</option>";
echo "<option value='hero-3'>hero-3</option>";
echo "<option value='struktur-organisasi'>struktur-organisasi</option>";
echo "<option value='test-upload'>test-upload</option>";
echo "</select></p>";
echo "<p><input type='file' name='test_image' accept='image/*'></p>";
echo "<button type='submit' class='btn btn-success'>📤 Upload Gambar</button>";
echo "</form>";
echo "</div>";

// Section 5: Fix Permission
echo "<div class='card'>";
echo "<h2>5. Fix Permissions</h2>";

if (isset($_GET['fix_permission']) && $imagesPath) {
    $result = @chmod($imagesPath, 0755);
    if ($result) {
        echo "<div class='success'>✅ Permission folder berhasil diubah ke 755</div>";
    } else {
        echo "<div class='error'>❌ Gagal mengubah permission. Coba manual via File Manager.</div>";
    }
}

if (isset($_GET['create_folder'])) {
    $newPath = __DIR__ . '/images';
    if (!is_dir($newPath)) {
        if (@mkdir($newPath, 0755, true)) {
            echo "<div class='success'>✅ Folder images berhasil dibuat!</div>";
        } else {
            echo "<div class='error'>❌ Gagal membuat folder. Buat manual via File Manager.</div>";
        }
    } else {
        echo "<div class='info'>Folder sudah ada</div>";
    }
}

echo "<p>";
echo "<a href='?fix_permission=1' class='btn'>🔧 Fix Permission (755)</a> ";
echo "<a href='?create_folder=1' class='btn'>📁 Create Images Folder</a>";
echo "</p>";
echo "</div>";

// Section 6: Laravel Config Check
echo "<div class='card'>";
echo "<h2>6. Laravel Path Check</h2>";

// Try to load Laravel
try {
    $laravelBase = dirname(__DIR__);
    if (file_exists($laravelBase . '/vendor/autoload.php')) {
        require $laravelBase . '/vendor/autoload.php';
        $app = require $laravelBase . '/bootstrap/app.php';
        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
        
        echo "<p><strong>Laravel public_path('images'):</strong> <code>" . public_path('images') . "</code></p>";
        echo "<p><strong>Laravel base_path():</strong> <code>" . base_path() . "</code></p>";
        echo "<p><strong>Laravel public_path():</strong> <code>" . public_path() . "</code></p>";
        
        $laravelImagesPath = public_path('images');
        if (is_dir($laravelImagesPath)) {
            echo "<div class='success'>✅ Laravel images path exists</div>";
        } else {
            echo "<div class='warning'>⚠️ Laravel images path doesn't exist</div>";
            echo "<p>Membuat folder...</p>";
            if (@mkdir($laravelImagesPath, 0755, true)) {
                echo "<div class='success'>✅ Folder berhasil dibuat via Laravel path!</div>";
            }
        }
    } else {
        echo "<div class='warning'>Laravel autoload tidak ditemukan di: $laravelBase/vendor/autoload.php</div>";
    }
} catch (Exception $e) {
    echo "<div class='error'>Error loading Laravel: " . $e->getMessage() . "</div>";
}
echo "</div>";

// Section 7: Cleanup
echo "<div class='card'>";
echo "<h2>⚠️ Cleanup</h2>";
echo "<p style='color:red;'><strong>HAPUS FILE INI setelah selesai untuk keamanan!</strong></p>";

if (isset($_GET['delete_self'])) {
    if (@unlink(__FILE__)) {
        echo "<div class='success'>✅ File berhasil dihapus!</div>";
        echo "<script>setTimeout(function(){ window.location.href = '/'; }, 2000);</script>";
    } else {
        echo "<div class='error'>❌ Gagal menghapus. Hapus manual via File Manager.</div>";
    }
} else {
    echo "<a href='?delete_self=1' class='btn btn-danger' onclick=\"return confirm('Yakin hapus file ini?')\">🗑️ Hapus File Ini</a>";
}
echo "</div>";

echo "</body></html>";
?>
