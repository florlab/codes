<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class Login extends Controller
{
    public function index(Request $request){
        if($request->isMethod('post')){
            $rules = [
                'username'  =>   'required',
                'password'  =>   'required'
            ];

            $validator = Validator::make(Input::all(),$rules);
            if($validator->fails()){
                return false;
            }else{
                //encrypt password and check on database
               return redirect('dashboard');
            }
        }
    }
}