<?php
/**
 * Fix Assets Script untuk Hostinger
 * Akses via: https://desa.odetune.shop/fix-assets.php
 * HAPUS FILE INI SETELAH SELESAI DIGUNAKAN!
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<html><head><title>Fix Assets - Web Desa</title>";
echo "<style>
body { font-family: Arial, sans-serif; max-width: 900px; margin: 20px auto; padding: 20px; background: #f5f5f5; }
.card { background: white; border-radius: 8px; padding: 20px; margin-bottom: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
h1 { color: #1e3a8a; }
h2 { color: #333; border-bottom: 2px solid #1e3a8a; padding-bottom: 10px; }
.success { color: #059669; background: #d1fae5; padding: 10px 15px; border-radius: 4px; margin: 10px 0; }
.error { color: #dc2626; background: #fee2e2; padding: 10px 15px; border-radius: 4px; margin: 10px 0; }
.warning { color: #d97706; background: #fef3c7; padding: 10px 15px; border-radius: 4px; margin: 10px 0; }
.info { color: #2563eb; background: #dbeafe; padding: 10px 15px; border-radius: 4px; margin: 10px 0; }
pre { background: #1e293b; color: #e2e8f0; padding: 15px; border-radius: 4px; overflow-x: auto; font-size: 13px; }
.btn { display: inline-block; padding: 12px 24px; background: #1e3a8a; color: white; text-decoration: none; border-radius: 4px; margin: 5px; border: none; cursor: pointer; font-size: 14px; }
.btn:hover { background: #1e40af; }
.btn-success { background: #059669; }
.btn-success:hover { background: #047857; }
code { background: #e2e8f0; padding: 2px 6px; border-radius: 3px; font-family: monospace; }
</style></head><body>";

echo "<h1>🔧 Fix Assets & CSS - Web Desa</h1>";

$documentRoot = $_SERVER['DOCUMENT_ROOT'];
$buildDir = $documentRoot . '/build';
$manifestPath = $buildDir . '/manifest.json';

// 1. Check Build Directory
echo "<div class='card'>";
echo "<h2>1. Check Build Directory</h2>";

if (is_dir($buildDir)) {
    echo "<p class='success'>✓ Folder /public/build/ exists</p>";
    
    // Check manifest.json
    if (file_exists($manifestPath)) {
        echo "<p class='success'>✓ manifest.json exists</p>";
        $manifest = json_decode(file_get_contents($manifestPath), true);
        if ($manifest) {
            echo "<p class='success'>✓ manifest.json is valid JSON</p>";
            echo "<pre>" . json_encode($manifest, JSON_PRETTY_PRINT) . "</pre>";
        } else {
            echo "<p class='error'>✗ manifest.json is invalid JSON</p>";
        }
    } else {
        echo "<p class='error'>✗ manifest.json NOT FOUND!</p>";
    }
    
    // Check assets folder
    $assetsDir = $buildDir . '/assets';
    if (is_dir($assetsDir)) {
        echo "<p class='success'>✓ Folder /public/build/assets/ exists</p>";
        
        $files = scandir($assetsDir);
        $cssFiles = array_filter($files, fn($f) => str_ends_with($f, '.css'));
        $jsFiles = array_filter($files, fn($f) => str_ends_with($f, '.js'));
        
        echo "<p class='info'>Found " . count($cssFiles) . " CSS file(s) and " . count($jsFiles) . " JS file(s)</p>";
        
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                $filepath = $assetsDir . '/' . $file;
                $size = round(filesize($filepath) / 1024, 2);
                $perms = substr(sprintf('%o', fileperms($filepath)), -4);
                $readable = is_readable($filepath) ? '✓' : '✗';
                echo "<p><code>{$file}</code> - {$size} KB - Perms: {$perms} - Readable: {$readable}</p>";
            }
        }
    } else {
        echo "<p class='error'>✗ Folder /public/build/assets/ NOT FOUND!</p>";
    }
} else {
    echo "<p class='error'>✗ Folder /public/build/ NOT FOUND!</p>";
    echo "<p class='warning'>This is the main problem! The build folder was not uploaded.</p>";
}
echo "</div>";

// 2. Check .htaccess
echo "<div class='card'>";
echo "<h2>2. Check .htaccess</h2>";

$htaccessPath = $documentRoot . '/.htaccess';
if (file_exists($htaccessPath)) {
    echo "<p class='success'>✓ .htaccess exists</p>";
    $htaccess = file_get_contents($htaccessPath);
    echo "<pre>" . htmlspecialchars($htaccess) . "</pre>";
} else {
    echo "<p class='error'>✗ .htaccess NOT FOUND!</p>";
}
echo "</div>";

// 3. Test Direct Access to Assets
echo "<div class='card'>";
echo "<h2>3. Test Direct Access to Assets</h2>";

if (file_exists($manifestPath)) {
    $manifest = json_decode(file_get_contents($manifestPath), true);
    
    if (isset($manifest['resources/css/app.css'])) {
        $cssFile = $manifest['resources/css/app.css']['file'];
        $cssUrl = '/build/' . $cssFile;
        $cssFullPath = $documentRoot . '/build/' . $cssFile;
        
        echo "<p><strong>CSS File:</strong> <a href='{$cssUrl}' target='_blank'>{$cssUrl}</a></p>";
        
        if (file_exists($cssFullPath)) {
            echo "<p class='success'>✓ CSS file exists on disk</p>";
            $size = round(filesize($cssFullPath) / 1024, 2);
            echo "<p class='info'>Size: {$size} KB</p>";
        } else {
            echo "<p class='error'>✗ CSS file NOT FOUND on disk!</p>";
        }
    }
    
    if (isset($manifest['resources/js/app.js'])) {
        $jsFile = $manifest['resources/js/app.js']['file'];
        $jsUrl = '/build/' . $jsFile;
        $jsFullPath = $documentRoot . '/build/' . $jsFile;
        
        echo "<p><strong>JS File:</strong> <a href='{$jsUrl}' target='_blank'>{$jsUrl}</a></p>";
        
        if (file_exists($jsFullPath)) {
            echo "<p class='success'>✓ JS file exists on disk</p>";
        } else {
            echo "<p class='error'>✗ JS file NOT FOUND on disk!</p>";
        }
    }
}
echo "</div>";

// 4. Solution
echo "<div class='card'>";
echo "<h2>4. Solution</h2>";

if (!is_dir($buildDir) || !file_exists($manifestPath)) {
    echo "<p class='warning'><strong>Problem:</strong> Build folder is missing or incomplete.</p>";
    echo "<h3>Option A: Upload build folder manually</h3>";
    echo "<ol>";
    echo "<li>Di komputer lokal, pastikan sudah menjalankan <code>npm run build</code></li>";
    echo "<li>Buka File Manager Hostinger</li>";
    echo "<li>Navigate ke <code>public_html/</code></li>";
    echo "<li>Upload folder <code>build/</code> dari <code>public/build/</code> lokal Anda</li>";
    echo "<li>Pastikan struktur folder: <code>public_html/build/manifest.json</code> dan <code>public_html/build/assets/</code></li>";
    echo "</ol>";
    
    echo "<h3>Option B: Re-extract ZIP dengan benar</h3>";
    echo "<ol>";
    echo "<li>Pastikan saat extract ZIP, folder <code>public/build/</code> juga ter-extract</li>";
    echo "<li>Struktur yang benar:";
    echo "<pre>
public_html/
├── build/
│   ├── manifest.json
│   └── assets/
│       ├── app-XXXXX.css
│       └── app-XXXXX.js
├── index.php
├── .htaccess
└── ... (file lainnya)
</pre>";
    echo "</li>";
    echo "</ol>";
} else {
    echo "<p class='success'>Build folder exists. Checking permissions...</p>";
}

// Fix permissions button
if (isset($_GET['action']) && $_GET['action'] === 'fix_perms') {
    echo "<h3>Fixing Permissions...</h3>";
    
    if (is_dir($buildDir)) {
        chmod($buildDir, 0755);
        echo "<p class='info'>Set 755 on /build/</p>";
        
        if (is_dir($buildDir . '/assets')) {
            chmod($buildDir . '/assets', 0755);
            echo "<p class='info'>Set 755 on /build/assets/</p>";
            
            $files = glob($buildDir . '/assets/*');
            foreach ($files as $file) {
                chmod($file, 0644);
                echo "<p class='info'>Set 644 on " . basename($file) . "</p>";
            }
        }
        
        if (file_exists($manifestPath)) {
            chmod($manifestPath, 0644);
            echo "<p class='info'>Set 644 on manifest.json</p>";
        }
        
        echo "<p class='success'>Permissions fixed! Try refreshing the main website.</p>";
    }
}

echo "<p><a href='?action=fix_perms' class='btn btn-success'>Fix Permissions (755/644)</a></p>";
echo "</div>";

// 5. Quick Check
echo "<div class='card'>";
echo "<h2>5. Verify After Fix</h2>";
echo "<p>After uploading or fixing, test these URLs:</p>";
echo "<ul>";
echo "<li><a href='/' target='_blank'>Homepage</a> - Should have styling</li>";
if (file_exists($manifestPath)) {
    $manifest = json_decode(file_get_contents($manifestPath), true);
    if (isset($manifest['resources/css/app.css'])) {
        $cssFile = $manifest['resources/css/app.css']['file'];
        echo "<li><a href='/build/{$cssFile}' target='_blank'>CSS File Direct</a> - Should show CSS code</li>";
    }
}
echo "</ul>";
echo "<p><a href='/' class='btn'>Go to Homepage</a></p>";
echo "</div>";

echo "<p style='text-align:center; color:#666; margin-top:20px;'>⚠️ DELETE THIS FILE (fix-assets.php) AFTER USE!</p>";
echo "</body></html>";
