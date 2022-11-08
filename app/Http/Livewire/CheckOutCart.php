<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckOutCart extends Component
{
    public function render()
    {
        return view('livewire.check-out-cart');
    }

    public function checkout($cartTotal)
    {
        // insert order_cart
        $cart_data = array();
        $cart_data['userId'] = Auth::user()->userID;
        $cart_data['cartTotal'] = $cartTotal;
        $cartId = DB::table('cart_master')->insertGetId($cart_data);
        // session()->flush();
        session()->forget('cartId');
        session()->put('cartId', $cartId);
        session()->save();
        $content = Cart::content();
        foreach ($content as $v_content) {
            DB::table('cart_details') -> insert([
                'cartId' => $cartId,
                'gameId' => $v_content->id,
                'gamePrice' => $v_content->price,
                'gameIcon' => $v_content->options->image,
                'gameSale' => (int)$v_content->options->sale
            ]);  
        } 

        $this->emit('form_updated');
    }

    public function removeCart($rowId) 
    {
        $gameId = Cart::get($rowId)->id;
        $userID = Auth::user()->userID;
        DB::table('store_cart')->where('userID', $userID)->where('gameId', $gameId)->delete();
        Cart::remove($rowId);
        $this->emit('cart_updated');
    }
}
