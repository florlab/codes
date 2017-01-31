<?php

namespace App\Http\Controllers;
use App\Repositories\AppSecurity;
use Illuminate\Http\Request;

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

    public function cart(Request $request){
        $data = $request->session()->all();
        return view('cart',array(
            'data' => $data
        ));
    }

    public function addToCart(Request $request){
        $request->session()->put('cart.item', $request->input('item'));
        echo 'added to cart!';
    }
}
