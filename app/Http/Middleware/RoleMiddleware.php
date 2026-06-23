<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * Memastikan user yang login memiliki role yang sesuai.
     *
     * Penggunaan di route: middleware('role:admin') atau middleware('role:petugas')
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!auth()->check() || auth()->user()->role !== $role) {
            abort(403, 'Akses ditolak. Kamu tidak punya izin untuk halaman ini.');
        }

        return $next($request);
    }
}
