<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorizationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorizationController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('authorization.login');
    }

    public function login(AuthorizationRequest $request)
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        $data = $request->validated();
        if (Auth::attempt($data, $request->remember)) {
            return redirect()->intended(route('home'));
        }

        return redirect()->route('login')
            ->withErrors(['auth_error' => 'Не правильно введен логин или пароль']);
    }

    public function logout(Request $request)
    {
        Auth::user()->setRememberToken(null);
        Auth::user()->save();
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
