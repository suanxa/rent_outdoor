<?php

namespace App\Http\Middleware;

use Closure;

class RoleSekAdmin
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'sek_admin') {
            return $next($request);
        }
        abort(403, 'Akses ditolak: Hanya sek_admin.');
    }
}
