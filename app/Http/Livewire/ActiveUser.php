<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;

class ActiveUser extends Component
{
    public function render()
    {
        $users = User::all();
        return view('livewire.active-user', compact('users'));
    }

    public function deactivateUser($id) {
        $user = User::where('userID', $id)->update([
            'blocked_at' => now(),
        ]);

        Cart::destroy();
    }

    public function activateUser($id) {
        $user = User::where('userID', $id)->update([
            'blocked_at' => NUll,
        ]);
    }
}
