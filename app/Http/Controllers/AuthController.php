<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\RegisterMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function create_user(Request $request)
{
    $request->validate([
        'name' => 'required|min:3|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|max:255',
    ]);

    $user = new User;
    $user->name = trim($request->name);
    $user->email = trim($request->email);
    $user->password = bcrypt($request->password);
    $user->remember_token = Str::random(40);
    $user->hash = sha1($user->email);

    // Generate verification token
    $user->verification_token = Str::random(60);

    $user->save();

    // Send verification email
    Mail::to($user->email)->send(new RegisterMail($user));

    return redirect('/')->with('success', 'User Berhasil Ditambahkan');
}



    public function authenticated(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email','password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }
        return back()->withErrors([
            'loginError' => 'Email atau password salah'
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }

}

