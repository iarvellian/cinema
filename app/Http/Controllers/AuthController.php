<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman registrasi
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Function registrasi pengguna baru
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role_id' => 2, // Default ke 'user'
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Function login pengguna
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role_id == 1) { // Admin
                return redirect()->route('admin.home-admin')->with('success', 'Login berhasil sebagai Admin.');
            } elseif ($user->role_id == 2) { // User
                return redirect()->route('user.home-user')->with('success', 'Login berhasil sebagai User.');
            }

            // Jika role tidak dikenali, logout dan kembalikan ke login
            Auth::logout();
            return redirect()->route('login')->withErrors(['error' => 'Role tidak dikenali.']);
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    // Menampilkan halaman update profile
    public function showUpdateProfileForm()
    {
        return view('auth.update-profile', ['user' => Auth::user()]);
    }

    // Function update profile
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'username' => 'required|string|unique:users,username,' . $user->id,
            'password' => 'nullable|string|min:6',
        ]);

        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        // Redirect berdasarkan role
        if ($user->role_id == 1) {
            return redirect()->route('v2.admin.home-admin')->with('success', 'Profil berhasil diperbarui.');
        } else if ($user->role_id == 2) {
            return redirect()->route('user.home-user')->with('success', 'Profil berhasil diperbarui.');
        }
    }

    // Function logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout berhasil.');
    }
}
