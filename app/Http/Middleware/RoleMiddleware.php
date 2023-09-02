<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles): Response
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Check if the user has at least one of the required roles
            foreach ($roles as $role) {
                if ($user->hasRole($role)) {
                    return $next($request);
                }
            }
        }

        // Redirect or handle unauthorized access (e.g., show a 403 page)
        return abort(403, 'Unauthorized action.');
    }
}
