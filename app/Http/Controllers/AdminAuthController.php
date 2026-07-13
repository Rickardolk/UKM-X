<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    // ===== DUMMY CREDENTIALS =====
    private string $dummyEmail    = 'admin@gmail.com';
    private string $dummyPassword = 'admin123';

    public function showLogin()
    {
        // Jika sudah login, langsung ke dashboard
        if (Session::get('is_admin')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Cek dummy credentials
        if (
            $request->email    === $this->dummyEmail &&
            $request->password === $this->dummyPassword
        ) {
            Session::put('is_admin', true);
            Session::put('admin_email', $request->email);
            return redirect()->route('admin.dashboard');
        }

        // Jika salah
        return back()
            ->with('error', 'Email atau password salah.')
            ->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Session::forget(['is_admin', 'admin_email']);
        return redirect()->route('admin.login');
    }
}