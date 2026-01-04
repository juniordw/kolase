<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        // Redirect if already logged in
        if (session('admin_id')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->with('error', 'Email atau password salah')->withInput();
        }

        if (!$admin->is_active) {
            return back()->with('error', 'Akun Anda tidak aktif. Hubungi administrator.')->withInput();
        }

        // Store admin info in session
        session([
            'admin_id' => $admin->id,
            'admin_name' => $admin->name,
            'admin_email' => $admin->email,
        ]);

        // Update last login
        $admin->update(['last_login_at' => now()]);

        return redirect()->route('admin.dashboard')->with('success', 'Selamat datang, ' . $admin->name);
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['admin_id', 'admin_name', 'admin_email']);
        $request->session()->flush();

        return redirect()->route('admin.login')->with('success', 'Anda telah keluar');
    }
}
