<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class DetailsCheckOutForm extends Component
{
    protected $listeners = ['details_form_updated' => 'render'];
    public $gameId;
    public $gamePrice;
    public $gameIcon;
    public $gameSale;

    public function mount($game) 
    {
        $this->gameId = $game->gameId;
        $this->gamePrice = $game->price;
        $this->gameIcon = $game->icon;
        $this->gameSale = $game->sale;
    }

    public function render()
    {
        $cartId = session('cartId');
        $payments = Payment::all();
        return view('livewire.details-check-out-form',compact('cartId', 'payments'));
    }

    public function removeCartM($cartId)
    {
        DB::table('cart_master')->where('cartId', $cartId)->delete();
    }
}
