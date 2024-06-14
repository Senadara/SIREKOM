<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function RoleAuth(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }
        if (Auth::guard('mahasiswa')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/mahasiswa/lomba');
        }

        return back()->withErrors([
            'username' => 'Invalid credentials',
            'password' => 'Invalid credentials',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect('/');
    }
}
