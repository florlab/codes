<?php

namespace App\Http\Controllers;
use App\Repositories\AppSecurity;

class TestController extends Controller
{
    public function service_container(AppSecurity $appSecurity){
        return $appSecurity->encryptedPassword('123');
    }

    public function jquery_validate(){
        return view('jquery-validate');
    }

    public function frontend(){
        return view('frontend');
    }

    public function angular(){
        return view('angular');
    }
}
