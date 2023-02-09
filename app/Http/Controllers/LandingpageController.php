<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;

class LandingpageController extends Controller
{
    public function index()
    {
        $dataInformasi = informasi::where('expired_at','>=',date('Y-m-d'))->get();
        return view('landing-page.landingPage',compact('dataInformasi'));
    }
}
