<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class DeletePaymentController extends Controller
{
    public function delete($id) {
        
        Payment::where('cardId', $id)->delete();

        return redirect('payment')->with('status', 'Delete payment successfully!');;
    }
}
