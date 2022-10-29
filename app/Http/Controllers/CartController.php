<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function addToCart(Request $rq) 
    {

        // $gameId = $rq->gameId;

        // $game = DB::table('game') 
        //     ->where('gameId', $gameId)
        //     ->first();

        // $data = array();    
        // $data['id'] = $game->gameId;
        // $data['qty'] = 1;
        // $data['name'] = $game->gameId;
        // $data['price'] = $game->price;
        // $data['weight'] = $game->sale;
        // $data['options']['image'] = $game->icon;

        // Cart::add($data);

        // return redirect('/home');
    }


    // public function addToCart($gameId) 
    // {
    //     $count = count(Cart::content());

    //     $game = DB::table('game') 
    //         ->where('gameId', $gameId)
    //         ->first();

    //     $data = array();    
    //     $data['id'] = $game->gameId;
    //     $data['qty'] = 1;
    //     $data['name'] = $game->gameId;
    //     $data['price'] = $game->price;
    //     $data['weight'] = $game->sale;
    //     $data['options']['image'] = $game->icon;

    //     Cart::add($data);

    //     if ($count == count(Cart::content())) {
    //         dd("This Game has been added to cart !");
    //     }

    // }

    public function show() 
    {
        // $carts = session()->get('carts');
        return view('home.cart');
    }

    public function removeCart($rowId) 
    {
        Cart::remove($rowId);
        return redirect('cart');
    }

    // public function countcart() 
    // {
    //     $count = count(Cart::content());
    //     $output = "";
    //     if ($count > 0) {
    //         $output.= '<span class="'. 'cart-count' . '">' . $count . '</span>';
    //     }

    //     return $output;
    //     dd($count);
    // }
}
