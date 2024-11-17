<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLogin()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input untuk mencegah input tidak valid
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        // Ambil data email dan password untuk autentikasi
        $credentials = $request->only('email', 'password');
    
        // Autentikasi pengguna
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Ambil status pekerjaan dari user yang sudah login
            $userRole = Auth::user()->status_pekerjaan;
            
            // Arahkan user berdasarkan status_pekerjaan
            switch ($userRole) {
                case 'Superadmin':
                    return redirect()->route('superadmin.dashboard')->with('success', 'Login berhasil sebagai Superadmin!');
                case 'Kasir':
                    return redirect()->route('kasir.dashboard')->with('success', 'Login berhasil sebagai Kasir!');
                default:
                    Auth::logout();
                    return redirect()->route('login')->withErrors(['error' => 'Status pekerjaan tidak valid.']);
            }
        }
    
        // Jika login gagal, tampilkan pesan error
        return redirect()->back()->withErrors([
            'error' => 'Login gagal. Silakan cek kembali email dan password Anda.',
        ])->withInput();
    }

    // Menampilkan form registrasi
    public function showRegister()
    {
        return view('register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:20',
            'email' => 'required|string|email|max:50|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'status_pekerjaan' => 'required|in:Superadmin,Kasir',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status_pekerjaan' => $request->status_pekerjaan,
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
    
    public function superadminDashboard()
    {
        return view('superadmin.dashboard');
    }

    public function kasirDashboard()
    {
        return view('kasir.dashboard');
    }
}
