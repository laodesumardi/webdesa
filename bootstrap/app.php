<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => \App\Http\Middleware\EnsureUserIsAdmin::class,
        ]);
        
        // Override default Authenticate middleware dengan custom
        $middleware->redirectGuestsTo(function (Request $request) {
            // Jika request ke admin routes, redirect ke admin login
            if ($request->is('admin/*')) {
                return route('admin.login');
            }
            // Untuk routes lainnya, tidak redirect (akan throw 401)
            return null;
        });
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Handle AuthenticationException untuk redirect ke admin login
        $exceptions->render(function (AuthenticationException $e, Request $request) {
            if ($request->is('admin/*') || $request->expectsJson()) {
                if ($request->expectsJson()) {
                    return response()->json(['message' => 'Unauthenticated.'], 401);
                }
                return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu.');
            }
        });
    })->create();
