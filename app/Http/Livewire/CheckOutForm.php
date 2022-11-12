<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;

class CheckOutForm extends Component
{
    protected $listeners = ['form_updated' => 'render'];

    public $payment;

    public function render()
    {
        $cartId = session('cartId');
        $payments = Payment::all();
        return view('livewire.check-out-form',compact('cartId', 'payments'));
    }

    public function removeCartM($cartId)
    {
        DB::table('cart_master')->where('cartId', $cartId)->delete();
    }
}
