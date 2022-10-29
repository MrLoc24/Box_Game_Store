<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartCounter extends Component
{
    protected $listeners = ['cart_updated' => 'render'];

    public function render()
    {
        $cart_count = count(Cart::content());
        return view('livewire.cart-counter', compact('cart_count'));
    }
}
