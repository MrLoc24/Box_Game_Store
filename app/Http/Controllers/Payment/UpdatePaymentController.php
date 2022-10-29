<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class UpdatePaymentController extends Controller
{
    public function store(Request $request, $id) {

        // dd($request->card_number);
        // dd($request->cvv);
        // dd($request->expiration);

        $payment = Payment::where('cardId', $id)->update([
            'card_number' => $request->card_number,
            'cvv' => $request->cvv,  
            'payment_date' => $request->expiration,
        ]);

        return redirect('payment')->with('status', 'Update payment successfully!');
    }
}
