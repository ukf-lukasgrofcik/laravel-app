<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{

    public function form() : View | Application | Factory
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request) : RedirectResponse
    {
        $credentials = $request->only(['email', 'password']);

        if ( auth()->attempt($credentials) ) {
            session()->regenerate();

            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout() : RedirectResponse
    {
        auth()->logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect('/login');
    }

}
