<?php

namespace App\Http\Controllers\CustomerArea;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function showRegisterPage()
    {
        return view('pages.customer.register');
    }

    /**
     * Handle an registration attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function register(Request $request)
    {
        User::validator($request)->validate();

        $user = new User();
        $user->firstname = ucfirst($request['firstname']);
        $user->lastname = strtoupper($request['lastname']);
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->save();

        // LOGIN
        return app(\App\Http\Controllers\CustomerArea\LoginController::class)
                ->authenticate($request);
    }
}
