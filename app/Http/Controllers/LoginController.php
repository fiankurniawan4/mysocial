<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('username', 'password');
        if (auth()->attempt($credentials)) {
            return redirect()->route('home');
        }

        $errors = [];

        if (!User::where('username', $data['username'])->exists()) {
            $errors['username'] = 'Username tidak ditemukan.';
        } else {
            if (!auth()->validate(['username' => $data['username'], 'password' => $data['password']])) {
                $errors['password'] = 'Password salah.';
            }
        }
        return back()->withErrors($errors);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
