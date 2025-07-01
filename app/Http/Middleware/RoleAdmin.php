<?php

namespace App\Http\Middleware;

use Closure;

class RoleAdmin
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }
        abort(403, 'pfttt!! nonono tidak boleh');
    }
}
