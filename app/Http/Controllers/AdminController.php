<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard ()
    {
        return view('content.dashboard');
    }
    public function santri()
    {
        return view('santri');
    }
}
