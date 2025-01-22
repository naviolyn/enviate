<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna telah login dan memiliki role 'staff'
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // Arahkan pengguna yang bukan staff ke halaman lain
        return redirect()->route('/'); // Ganti sesuai kebutuhan
    }
}