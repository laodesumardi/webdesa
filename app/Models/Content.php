<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'page',
        'section',
        'key',
        'title',
        'content',
    ];

    /**
     * Get content by page, section, and key
     */
    public static function getContent($page, $section, $key, $default = null)
    {
        $content = self::where('page', $page)
            ->where('section', $section)
            ->where('key', $key)
            ->first();
        
        return $content ? $content->content : $default;
    }

    /**
     * Get all contents for a specific page
     */
    public static function getPageContents($page)
    {
        return self::where('page', $page)
            ->orderBy('section')
            ->orderBy('key')
            ->get()
            ->groupBy('section');
    }
}
