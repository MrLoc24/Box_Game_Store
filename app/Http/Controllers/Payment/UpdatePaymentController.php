<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class UpdatePaymentController extends Controller
{
    public function store(Request $request, $id) {

        $month = substr("$request->expiration", 0, 2);
        $year = substr("$request->expiration", 3, 5);

        if ($month < now()->month && ("20" . $year) < now()->year) {
            return redirect('payment')->with('status2', 'Month is invalid.');
        }        
        
        if ("20" . $year < now()->year) {
            return redirect('payment')->with('status2', 'Year is invalid.');
        }

        $payment = Payment::where('cardId', $id)->update([
            'card_number' => str_replace("-","", $request->card_number),
            'cvv' => $request->cvv,  
            'payment_date' => $request->expiration,
        ]);

        return redirect('payment')->with('status', 'Update payment successfully!');
    }
}
