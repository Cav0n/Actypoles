<?php

namespace App\Http\Controllers\BackOffice;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    const REDIRECT_AFTER_LOGIN = '/admin';

    public function showLoginPage()
    {
        return view("pages.admin.login");
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('login', 'password');

        if (null !== $admin = Admin::where('email', $credentials['login'])->first()) {
            if (Hash::check($request['password'], $admin->password)) {
                $admin->sessionToken = bin2hex(random_bytes(5));
                $admin->save();

                $request->session()->put('admin', $admin);
                return redirect(route('admin.homepage'));
            }
        }

        if (null !== $admin = Admin::where('nickname', $credentials['login'])->first()) {
            if (Hash::check($request['password'], $admin->password)) {
                $admin->sessionToken = bin2hex(random_bytes(5));
                $admin->save();

                $request->session()->put('admin', $admin);
                return redirect(route('admin.homepage'));
            }
        }

        return back()->withInput()->withErrors(['login' => __('auth.failed')]);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin');

        return redirect(route('homepage'));
    }
}
