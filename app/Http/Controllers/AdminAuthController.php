<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('email','password');

        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => __('The provided credentials are incorrect.'),
            ]);
        }

        // Allow only the single admin interface.
        // In this project, role === 'faculty' maps to admin layout.
        if (Auth::user()->role !== 'faculty') {
            Auth::logout();
            throw ValidationException::withMessages([
                'email' => __('Access denied. Admins only.'),
            ]);
        }

        $request->session()->regenerate();
        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}

