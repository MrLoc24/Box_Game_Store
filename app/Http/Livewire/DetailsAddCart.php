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
        $data['weight'] = $game->sale;
        $data['options']['image'] = $game->icon;

        Cart::add($data);

        $this->emit('cart_updated');
    }
}
