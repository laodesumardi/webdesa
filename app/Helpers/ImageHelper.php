<?php

namespace App\Helpers;

class ImageHelper
{
    /**
     * Get the correct images directory path
     * Works for both local development and Hostinger hosting
     * All images are stored in public/images/
     */
    public static function getImagesPath()
    {
        // Primary: Use Laravel's public_path
        $laravelPath = public_path('images');
        
        // Create if doesn't exist
        if (!is_dir($laravelPath)) {
            @mkdir($laravelPath, 0755, true);
        }
        
        return $laravelPath;
    }
    
    /**
     * Find an image file with various extensions in public/images/
     * Returns the asset URL if found, or fallback if not
     */
    public static function findImage($baseName, $fallback = null)
    {
        $extensions = ['png', 'jpg', 'jpeg', 'webp', 'gif'];
        $imagesPath = public_path('images');
        
        foreach ($extensions as $ext) {
            $filePath = $imagesPath . DIRECTORY_SEPARATOR . $baseName . '.' . $ext;
            if (file_exists($filePath)) {
                return asset('images/' . $baseName . '.' . $ext) . '?v=' . filemtime($filePath);
            }
        }
        
        return $fallback;
    }
    
    /**
     * Find image and return array with url, filename, and exists flag
     * Used for admin preview
     */
    public static function findImageInfo($baseName, $fallback = null)
    {
        $extensions = ['png', 'jpg', 'jpeg', 'webp', 'gif'];
        $imagesPath = public_path('images');
        
        foreach ($extensions as $ext) {
            $filePath = $imagesPath . DIRECTORY_SEPARATOR . $baseName . '.' . $ext;
            if (file_exists($filePath)) {
                return [
                    'url' => asset('images/' . $baseName . '.' . $ext) . '?v=' . filemtime($filePath),
                    'filename' => $baseName . '.' . $ext,
                    'exists' => true,
                    'path' => $filePath
                ];
            }
        }
        
        return [
            'url' => $fallback,
            'filename' => $baseName . '.jpg',
            'exists' => false,
            'path' => null
        ];
    }
    
    /**
     * Check if an image exists in public/images/
     */
    public static function imageExists($baseName)
    {
        $extensions = ['png', 'jpg', 'jpeg', 'webp', 'gif'];
        $imagesPath = public_path('images');
        
        foreach ($extensions as $ext) {
            if (file_exists($imagesPath . DIRECTORY_SEPARATOR . $baseName . '.' . $ext)) {
                return true;
            }
        }
        
        return false;
    }
    
    /**
     * Get full image path for a given basename
     */
    public static function getFullPath($filename)
    {
        return public_path('images' . DIRECTORY_SEPARATOR . $filename);
    }
    
    /**
     * Delete old images with same basename but different extensions
     */
    public static function deleteOldImages($baseName)
    {
        $extensions = ['png', 'jpg', 'jpeg', 'webp', 'gif'];
        $imagesPath = public_path('images');
        
        foreach ($extensions as $ext) {
            $filePath = $imagesPath . DIRECTORY_SEPARATOR . $baseName . '.' . $ext;
            if (file_exists($filePath)) {
                @unlink($filePath);
            }
        }
    }
}
