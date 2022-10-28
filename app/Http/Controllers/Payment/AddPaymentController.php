<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddPaymentController extends Controller
{
    public function add() {
        $payments = Payment::all();
        return view('user.profile.paymentmanagement')->with(['payments' => $payments]);
    }

    public function store(Request $request) {
        $userID = Auth::user()->userID;

        $payment = Payment::create([
            'userID' => $userID,
            'card_number' => $request->card_number,
            'cvv' => $request->cvv,
            'payment_date' => $request->expiration,
            'card_name' => $request->paymentname,
            'image' => $request->paymentimage,
        ]);

        return redirect('payment');
    }
}
