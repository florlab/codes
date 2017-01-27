<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function jquery_validate(){
        return view('jquery-validate');
    }

    public function frontend(){
        return view('frontend');
    }
}
