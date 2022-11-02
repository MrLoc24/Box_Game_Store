<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CheckOutForm extends Component
{
    protected $listeners = ['form_updated' => 'render'];

    public function render()
    {
        $cartId = session('cartId');
        return view('livewire.check-out-form',compact('cartId'));
    }

    public function removeCartM($cartId)
    {
        DB::table('cart_master')->where('cartId', $cartId)->delete();
    }
}
