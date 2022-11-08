<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddPaymentController extends Controller
{
    public function store(Request $request) {
        $userID = Auth::user()->userID;
        $month = substr("$request->expiration", 0, 2);
        $year = substr("$request->expiration", 3, 5);

        if ($month < now()->month && ("20" . $year) < now()->year) {
            return redirect('payment')->with('status2', 'Month is invalid.');
        }        
        
        if ("20" . $year < now()->year) {
            return redirect('payment')->with('status2', 'Year is invalid.');
        }

        $payment = Payment::create([
            'userID' => $userID,
            'card_number' => str_replace("-","", $request->card_number),
            'cvv' => $request->cvv,
            'payment_date' => $request->expiration,
            'card_name' => $request->paymentname,
            'image' => $request->paymentimage,
        ]);

        return redirect('payment')->with('status', 'Add payment successfully!');
    }

    public function store1(Request $request) {
        $userID = Auth::user()->userID;

        $payment = Payment::create([
            'userID' => $userID,
            'card_number' => "0",
            'cvv' => "0",
            'payment_date' => "0",
            'card_name' => $request->paymentname,
            'image' => $request->paymentimage,
        ]);

        return redirect('payment')->with('status', 'Add payment successfully!');
    }
}
