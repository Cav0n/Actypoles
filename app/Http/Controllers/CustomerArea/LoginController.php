<?php

namespace App\Http\Controllers\CustomerArea;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    const REDIRECT_AFTER_LOGIN = '/customer-area';

    public function showLoginPage()
    {
        return view('pages.customer.login');
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
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended(self::REDIRECT_AFTER_LOGIN);
        }

        return back()->withInput()->withErrors(['login' => __('auth.failed')]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect(route('homepage'));
    }
}
