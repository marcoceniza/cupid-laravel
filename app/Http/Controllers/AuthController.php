<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request) {
        
        $fields = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:3|confirmed'
        ]);

        User::create($fields);

        return redirect()->route('home');
    }

    public function login(Request $request) {
        
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3',
        ]);

        if(Auth::attempt($fields)) {
            return redirect()->intended();
        }else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
