<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function index() {
        return view('pages.auth.login');
    }

    public function checkAuth(AuthRequest $request) {
        $remember_me = (request()->has('remember_me')) ? true : false;
        if(\Auth::attempt(['email' => $request->email, 'password' => $request->password],$remember_me)) {
            return redirect()->intended(route('home'))->with('success', __("Welcome back."));
        } else {
            return redirect()->route('login')->with('danger',__('البريد الإلكتروني ام كلمه المرور غير صحيحه'))->withInput();
        }
    }

}
