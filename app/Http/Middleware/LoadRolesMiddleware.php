<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Context;
use Symfony\Component\HttpFoundation\Response;

class LoadRolesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {

            // Auth::roles are getting roles from role_user and making them lower cases
            // Context::addHidden('role', strtolower(Auth::user()->role->name));
            Context::addHidden('roles', array_map('strtolower', Auth::user()->roles->pluck('name')->toArray()));
        }

        return $next($request);
    }
}
