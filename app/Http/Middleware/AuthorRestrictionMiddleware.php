<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthorRestrictionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // dd('ss');
        // Check if user is authenticated and role is 'author'
        // if (Auth::check() && Auth::user()->role->name === 'author') {
        //     abort(403, 'Unauthorized access.');

        //     // Allow access only to submission_details route
        //     // if ($request->route()->getName() !== 'submission_details') {
        //     // }
        // }

        return $next($request);
    }
}
