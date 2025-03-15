<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Foundation\Application;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )

    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->appendToGroup(
        //     'web',
        //     \App\Http\Middleware\LoadRolesMiddleware::class,
        // );
        $middleware->alias([
            'auth' => Authenticate::class,
            'guest' => RedirectIfAuthenticated::class,
            'role' => \App\Http\Middleware\RoleAccessMiddleware::class,
            'authorRestrict' => \App\Http\Middleware\AuthorRestrictionMiddleware::class
        ]);
        app('router')->middleware('loadRoles', \App\Http\Middleware\LoadRolesMiddleware::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
