<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\AppSecurity;

class TestController extends Controller
{
    public function index(AppSecurity $appSecurity)
    {
        return $appSecurity->encryptedPassword('123');
    }

    public function jquery_validate(){
        return view('jquery-validate');
    }

    public function frontend(){
        return view('frontend');
    }
}
