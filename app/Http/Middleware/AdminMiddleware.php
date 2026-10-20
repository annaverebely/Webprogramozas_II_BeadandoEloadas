<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// admin elérés
class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()?->role != 1) {
            abort(403, 'Ehhez az oldalhoz admin jogosultság szükséges.');
        }

        return $next($request);
    }
}
