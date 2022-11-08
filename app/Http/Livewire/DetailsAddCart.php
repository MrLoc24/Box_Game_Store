<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class DetailsAddCart extends Component
{
    public $gameId;

    public function mount($gameId) 
    {
        $this->gameId = $gameId;
    }

    public function render()
    {
        $gameIds = array();
        if (Auth::check()) {
            $cartMs = DB::table('cart_master')->where('userID', Auth::user()->userID)->where('status', 1)->get();
            foreach ($cartMs as $keyM => $cartM) {
                $cartDs = DB::table('cart_details')->where('cartId', $cartM->cartId)->get();
                foreach ($cartDs as $keyD => $cartD) {
                    array_push($gameIds, $cartD->gameId);
                } 
            }
        }    
        return view('livewire.details-add-cart', compact('gameIds'));
    }

    public function addToCart($gameId) 
    {
        $game = DB::table('game') 
            ->where('gameId', $gameId)
            ->first();

        $data = array();    
        $data['id'] = $game->gameId;
        $data['qty'] = 1;
        $data['name'] = $game->gameId;
        $data['price'] = $game->price;
        $data['weight'] = 1;
        $data['options']['image'] = $game->icon;
        $data['options']['sale'] = "$game->sale";

        Cart::add($data);

        $userID = Auth::user()->userID;

        DB::table('store_cart')->insert([
            'userID' => $userID,
            'gameId' => $gameId
        ]);

        $this->emit('cart_updated');
    }

    public function checkout($gameId)
    {
        $game = DB::table('game') 
            ->where('gameId', $gameId)
            ->first();

        // insert order_cart
        $cart_data = array();
        $cart_data['userId'] = Auth::user()->userID;
        $cart_data['cartTotal'] = $game->price * (1 - $game->sale / 100);
        $cartId = DB::table('cart_master')->insertGetId($cart_data);
        // session()->flush();
        session()->forget('cartId');
        session()->put('cartId', $cartId);
        session()->save();
        DB::table('cart_details') -> insert([
            'cartId' => $cartId,
            'gameId' => $game->gameId,
            'gamePrice' => $game->price,
            'gameIcon' => $game->icon,
            'gameSale' => $game->sale
        ]);  

        $this->emit('details_form_updated');
    }
}
