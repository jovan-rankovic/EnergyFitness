<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    public function handle($request, Closure $next)
    {
        if (session()->has('user')) {
            if (session()->get('user')->role->name == 'admin') {
                return $next($request);
            }
        }
        return abort(403);
    }
}
