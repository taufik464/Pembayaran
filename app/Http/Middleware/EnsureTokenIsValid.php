<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Daftar role yang diizinkan
        $roles = ['superadmin', 'staff'];
        $userRole = $request->user()->role;
        // Jika user tidak login atau rolenya tidak ada dalam daftar
        if ($userRole != ($roles)) {
           return abort(403, 'Akses ditolak. Anda tidak memiliki izin untuk mengakses halaman ini.');
        }
        return $next($request);
    }
}
