<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function showHomepage()
    {
        return view('pages.public.homepage');
    }
}
