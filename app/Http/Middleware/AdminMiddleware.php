<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()?->email !== 'salte@salte.com') {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
