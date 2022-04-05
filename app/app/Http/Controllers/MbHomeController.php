<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MbHomeController extends Controller
{
    //

    public function Index(){
        return view('mobile.home');
    }
}
