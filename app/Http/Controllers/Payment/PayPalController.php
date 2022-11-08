<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class PayPalController extends Controller
{

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    {
        $total = Session::get('total_after');
        $id = Session::get('cart_Id');
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => URL::to('success-transaction/' . $id),
                // route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $total
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('cart')
                ->with('error', 'Something went wrong.');

        } else {
            return redirect()
                ->route('cart')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request, $id)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            DB::table('cart_master')->where('cartId', $id)->update(['status' => 1]);
            Cart::destroy();
            return redirect()
                ->route('cart')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('cart')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('cart')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }


    public function processTransaction1(Request $request)
    {
        $total = Session::get('total_after');
        $id = Session::get('cart_Id');
        $gameId = DB::table('cart_details')->where('cartId', $id)->first()->gameId;
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => URL::to('success-transaction1/' . $id),
                // route('successTransaction'),
                "cancel_url" => route('cancelTransaction1'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $total
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()->route('details', ['id' => $gameId]);
        } else {
            return redirect()->route('details', ['id' => $gameId]);
        }
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction1(Request $request, $id)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        $gameId = DB::table('cart_details')->where('cartId', $id)->first()->gameId;

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            DB::table('cart_master')->where('cartId', $id)->update(['status' => 1]);
            foreach(Cart::content() as $cart) {
                if($cart->id == $gameId) {
                    $rowId = $cart->rowId;
                    Cart::remove($rowId);
                    $userID = Auth::user()->userID;
                    DB::table('store_cart')->where('userID', $userID)->where('gameId', $gameId)->delete();
                }
            }
            return redirect()->route('details', ['id' => $gameId]);
        } else {
            return redirect()->route('details', ['id' => $gameId]);
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction1(Request $request)
    {
        $id = Session::get('cart_Id');
        $gameId = DB::table('cart_details')->where('cartId', $id)->first()->gameId;
        return redirect()->route('details', ['id' => $gameId]);
    }
}
