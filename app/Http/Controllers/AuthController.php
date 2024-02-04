<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function loginCreate()
    {
        return view('index');
    }

    public function registerCreate()
    {
        return view('register');
    }

    public function loginStore(LoginRequest $request)
    {
        $user = $request->validated();

        if ( Auth::attempt($user) ) {
            if ( auth()->user()->role === 'admin' ) {
                Alert::success('Berhasil', 'Selamat datang dihalaman admin Bulletin Board!');
                return redirect()->route('dashboard_admin');
            } else {
                Alert::success('Berhasil', 'Selamat datang dihalaman dashboard Bulletin Board!');
                return redirect()->route('dashboard_user');
            }
        } else {
            Alert::error('Gagal', 'Email atau password salah!');
            return redirect()->route('login_index');
        }
    }

    public function registerStore(RegisterRequest $request)
    {
        $user = $request->validated();
        
        // Check email is already exist

        $emails = User::all();
        foreach ( $emails as $email ) {
            if ( $user['email'] === $email->email ) {
                Alert::error('Gagal', 'Email sudah pernah digunakan!');
                return redirect()->route('register_index');
            }
        }

        // Check password
        if ( $user['password'] !== $request->input('confirmation-password') ) {
            Alert::error('Gagal', 'Konfirmasi password tidak sesuai!');
            return redirect()->route('register_index');
        }

        // Create user
        User::create($user + ['role' => 'user']);
        Alert::success('Berhasil', 'Akun Anda berhasil terdaftar!');
        return redirect()->route('login_index');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
