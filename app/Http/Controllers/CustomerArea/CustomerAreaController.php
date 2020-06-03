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
}
