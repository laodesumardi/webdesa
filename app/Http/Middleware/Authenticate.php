<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Jika request ke admin routes, redirect ke admin login
        if ($request->is('admin/*')) {
            return route('admin.login');
        }
        
        // Untuk routes lainnya, return null (akan throw 401)
        return null;
    }
}
