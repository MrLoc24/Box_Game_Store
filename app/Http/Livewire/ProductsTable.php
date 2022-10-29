<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductsTable extends Component
{
    public function render()
    {
        $game = DB::table('game')->get();
        return view('livewire.products-table', compact('game'));
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
