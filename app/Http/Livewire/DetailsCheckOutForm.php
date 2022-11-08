<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

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

    public function update($cartId) 
    {
        DB::table('cart_master')->where('cartId', $cartId)->update(['status' => 1]);
        $gameId = DB::table('cart_details')->where('cartId', $cartId)->first()->gameId;
        foreach(Cart::content() as $cart) {
            if($cart->id == $gameId) {
                $rowId = $cart->rowId;
                Cart::remove($rowId);
                $userID = Auth::user()->userID;
                DB::table('store_cart')->where('userID', $userID)->where('gameId', $gameId)->delete();
            }
        }
        return redirect()->route('details', ['id' => $gameId]);
    }
}
