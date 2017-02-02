<?php

namespace App\Http\Controllers;
use App\Repositories\AppSecurity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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

    public function template(){
        return view('template');
    }

    public function cart(Request $request){
        //$request->session()->flush();
        $data = $request->session()->get('cart.item');
        return view('cart',array(
            'data' => $data
        ));
    }

    public function addToCart(Request $request){
        if (!in_array($request->input('item'), $request->session()->get('cart.item'))) {
        $request->session()->push('cart.item', $request->input('item'));
        echo 'added to cart!';

            return Redirect::to('cart');
        }else{
            echo 'already on cart!';

            return Redirect::to('cart');
        }
    }

    public function removeToCart($key){
        $cart_array = Session::get('cart.item');
        unset($cart_array[$key]);
        Session::set('cart.item', $cart_array);
        echo 'removed to cart!';

        return Redirect::to('cart');
    }
}
