<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        // return $request;
        $user = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($user)) {
            $request->session()->regenerate();
            $role = Auth::user()->role;
            switch ($role) {
                case "admin":
                    return redirect()->intended('/admin/dashboard')->with('toast_success', 'Anda Berhasil Login');
                case "pimpinan":
                    return redirect()->intended('/pimpinan/dashboard')->with('toast_success', 'Anda Berhasil Login');
            }
        } else {
            return back()->with('toast_error', 'Anda Gagal Login!');
        }
    }
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
