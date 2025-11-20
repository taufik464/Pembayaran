<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class isSuperadminOrStaff
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
        $userRole = optional($request->user())->role;
        // Jika user tidak login atau rolenya tidak ada dalam daftar
        if (! $request->user() || ! in_array($userRole, $roles)) {
              return redirect('/login');
        }
        return $next($request);
    }
}

