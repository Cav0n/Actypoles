<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackOfficeController extends Controller
{
    public function showHomepage()
    {
        return view('pages.admin.homepage');
    }
}
