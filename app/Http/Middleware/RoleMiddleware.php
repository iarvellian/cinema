<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirect ke halaman login jika belum login
        }

        $user = Auth::user();
        if ($user->role->jenis_role !== $role) {
            abort(403, 'Unauthorized.'); // Tampilkan pesan error jika role tidak sesuai
        }

        return $next($request);
    }
}
