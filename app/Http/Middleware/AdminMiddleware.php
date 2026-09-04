<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user() || !in_array($request->user()->role, ['super_admin', 'store_manager', 'sales_staff', 'inventory_staff', 'accountant', 'viewer'])) {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
