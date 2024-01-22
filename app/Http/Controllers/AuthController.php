<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
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

    public function loginStore()
    {

    }

    public function registerStore(RegisterRequest $request)
    {
        $user = $request->validated();
        
        // cek password
        if ( $user['password'] !== $request->input('confirmation-password') ) {
            Alert::error('Gagal!', 'Konfirmasi password tidak sesuai');
            return redirect()->route('register_index');
        }

        // Create user
        User::create($user + ['role' => 'user']);
        Alert::success('Berhasil!', 'Akun Anda berhasil terdafar');
        return redirect()->route('login_index');
    }
}
