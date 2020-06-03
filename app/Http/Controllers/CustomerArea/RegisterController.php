<?php

namespace App\Http\Controllers\CustomerArea;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    const PASSWORD_REGEX = '^(?=.*[A-Z])(?=.*[!@#$&*])(?=.*[0-9])(?=.*[a-z]).{8}$';

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
        $this->validator($request)->validate();

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

    protected function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'firstname' => 'required|min:2',
            'lastname' => 'required|min:2',
            'email' => 'required|email:filter|unique:users',
            'password' => 'required|confirmed|regex:/'.self::PASSWORD_REGEX.'/i'
        ]);
    }
}
