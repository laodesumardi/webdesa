<?php
/**
 * Script untuk membuat folder storage yang diperlukan
 * Hapus file ini setelah selesai digunakan
 */

$folders = [
    'storage/framework/sessions',
    'storage/framework/views',
    'storage/framework/cache/data',
    'storage/framework/testing',
    'storage/logs',
    'storage/app/public',
];

echo "<h2>Creating Storage Folders...</h2>";

foreach ($folders as $folder) {
    if (!is_dir($folder)) {
        if (mkdir($folder, 0755, true)) {
            echo "✓ Created: $folder<br>";
        } else {
            echo "✗ Failed to create: $folder<br>";
        }
    } else {
        echo "✓ Already exists: $folder<br>";
    }
}

echo "<br><h3>Done! You can now delete this file.</h3>";
