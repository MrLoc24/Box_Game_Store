<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    // public function checkout($cartTotal) {
    //     // insert order_cart
    //     $cart_data = array();
    //     $cart_data['userId'] = Auth::user()->userID;
    //     $cart_data['cartTotal'] = $cartTotal;
    //     $cartId = DB::table('cart_master')->insertGetId($cart_data);

    //     // insert order_cart
    //     $content = Cart::content();
    //     foreach ($content as $v_content) {
    //         DB::table('cart_details') -> insert([
    //             'cartId' => $cartId,
    //             'gameId' => $v_content->id,
    //             'gamePrice' => $v_content->price,
    //             'gameIcon' => $v_content->options->image,
    //             'gameSale' => $v_content->weight
    //         ]);  
    //     }   
    //     return redirect('cart');
    // }
}
