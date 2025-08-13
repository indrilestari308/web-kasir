<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = auth()->user();

        // Bypass jika role superadmin (Indri)
        if ($user && $user->role === 'superadmin') {
            return $next($request);
        }

        // Cek role normal
        if ($user && in_array($user->role, $roles)) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
