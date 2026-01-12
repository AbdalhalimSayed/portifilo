<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function store(LoginRequest $request)
    {
        $credentials = $request->only("email", "password");

        if (Auth::attempt($credentials)) {
            
            $request->session()->regenerate();

            return to_route("admin.dashboard");
        }

        return back()->withErrors([
            'email' => 'error',
        ])->onlyInput('email');
    }

    public function logout(){
        Auth::logout();
        return to_route("index");
    }
}
