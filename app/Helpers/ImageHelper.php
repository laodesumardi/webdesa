<?php

namespace App\Helpers;

class ImageHelper
{
    /**
     * Get the correct images directory path
     * Works for both local development and Hostinger hosting
     */
    public static function getImagesPath()
    {
        // Method 1: Standard Laravel public_path
        $laravelPath = public_path('images');
        if (is_dir($laravelPath) && is_writable($laravelPath)) {
            return $laravelPath;
        }
        
        // Method 2: Document root + /images (for Hostinger where public is document root)
        $docRootPath = $_SERVER['DOCUMENT_ROOT'] . '/images';
        if (is_dir($docRootPath)) {
            return $docRootPath;
        }
        
        // Method 3: Document root + /public/images
        $docRootPublicPath = $_SERVER['DOCUMENT_ROOT'] . '/public/images';
        if (is_dir($docRootPublicPath)) {
            return $docRootPublicPath;
        }
        
        // Method 4: Try to create using Laravel path
        if (!is_dir($laravelPath)) {
            @mkdir($laravelPath, 0755, true);
        }
        
        return $laravelPath;
    }
    
    /**
     * Find an image file with various extensions
     * Returns the asset URL if found, or fallback if not
     */
    public static function findImage($baseName, $fallback = null)
    {
        $extensions = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
        
        // Try multiple possible paths
        $possibleBasePaths = [
            public_path('images'),
            $_SERVER['DOCUMENT_ROOT'] . '/images',
            $_SERVER['DOCUMENT_ROOT'] . '/public/images',
        ];
        
        foreach ($possibleBasePaths as $basePath) {
            if (!is_dir($basePath)) {
                continue;
            }
            
            foreach ($extensions as $ext) {
                $filePath = $basePath . '/' . $baseName . '.' . $ext;
                if (file_exists($filePath)) {
                    // Return the correct URL
                    return asset('images/' . $baseName . '.' . $ext);
                }
            }
        }
        
        return $fallback;
    }
    
    /**
     * Check if an image exists
     */
    public static function imageExists($baseName)
    {
        return self::findImage($baseName) !== null;
    }
    
    /**
     * Get image URL with cache busting
     */
    public static function getImageUrl($baseName, $fallback = null)
    {
        $url = self::findImage($baseName, $fallback);
        
        if ($url && strpos($url, 'http') === 0 && strpos($url, 'unsplash') === false) {
            // Add cache busting for local images
            $url .= '?v=' . time();
        }
        
        return $url;
    }
}
