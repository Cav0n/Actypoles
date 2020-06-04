<?php

namespace App\Http\Controllers\CustomerArea;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerAreaController extends Controller
{
    public function showHomepage()
    {
        return view('pages.customer.homepage');
    }

    public function showPasswordForgotten()
    {
        return view('pages.customer.forgotten-password.check-email');
    }

    public function showPasswordReset(Request $request)
    {
        return view('pages.customer.forgotten-password.reset-password')->with(['id' => $request['id'], 'token' => $request['token']]);
    }
}
