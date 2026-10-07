<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Pakai optional() atau (string) cast untuk mencegah error null
        $userRole = (string) auth()->user()->role;

        if (strcasecmp($userRole, $role) !== 0) {
            abort(403, 'Akses ditolak. Anda tidak memiliki izin untuk mengakses halaman ini.');
        }

        return $next($request);
    }
}
