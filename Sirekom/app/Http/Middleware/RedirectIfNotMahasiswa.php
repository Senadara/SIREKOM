<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotMahasiswa
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('mahasiswa')->check()) {
            return redirect('/mahasiswa/login');
        }

        return $next($request);
    }
}