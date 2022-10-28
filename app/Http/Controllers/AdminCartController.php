<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCartController extends Controller
{
    public function index () {
        $carts = DB::table('cart_master')->get();
        return view('admin.cart.order', ['carts' => $carts]);
    }

    public function indexCartDetails() {
        $cartDs = DB::table('cart_details')->get();
        return view('admin.cart.order_details', ['cartDs' => $cartDs]);
    }
}
