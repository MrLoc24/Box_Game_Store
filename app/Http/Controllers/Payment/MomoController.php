<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class MomoController extends Controller
{
    public function execPostRequest($url, $data) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function processTransaction() {

        $total = \Session::get('total_after');
        $id = \Session::get('cart_Id');

        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $orderInfo = "Thanh toán qua MoMo";
        $amount = $total * 23000;
        $orderId = time() . "";
        $_POST['orderId'] = $orderId;
        // $redirectUrl = "http://127.0.0.1:8000/cart";
        $ipnUrl = "http://127.0.0.1:8000/cart";
        $extraData = "";


        $requestId = time() . "";
        $requestType = "payWithATM";
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . env('MOMO_ACCESS_KEY') . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . env('MOMO_PARTNER_CODE') . "&redirectUrl=" . \URL::to('momo-success/' . $id) . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, env('MOMO_SECRET_KEY'));
        $data = array('partnerCode' => env('MOMO_PARTNER_CODE'),
            'partnerName' => "Test",
            "storeId" => "BoxGameStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => \URL::to('momo-success/' . $id),
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature);
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json
        //Just a example, please check more in there

        return redirect()->to($jsonResult['payUrl']);

    }

    public function successTransaction($id) {
        \DB::table('cart_master')->where('cartId', $id)->update(['status' => 1]);
        \Cart::destroy();
        return redirect()
            ->route('cart')
            ->with('success', 'Transaction complete.');
        // $requestId = time()."";
        // $endpoint = "https://test-payment.momo.vn/v2/gateway/api/query";
        // $result = 0; 
        // if (!empty($_POST)) {
        //     $orderId = $_POST["orderId"];;// Mã đơn hàng cần kiểm tra trạng thái
        
        //     //before sign HMAC SHA256 signature
        //     $rawHash = "accessKey=".env('MOMO_ACCESS_KEY')."&orderId=".$orderId."&partnerCode=".env('MOMO_PARTNER_CODE')."&requestId=".$requestId;
        //     // echo "<script>console.log('Debug Objects: " . $rawHash . "' );</script>";
        
        //     $signature = hash_hmac("sha256", $rawHash, env('MOMO_SECRET_KEY'));
        
        //     $data = array('partnerCode' => env('MOMO_PARTNER_CODE'),
        //         'requestId' => $requestId,
        //         'orderId' => $orderId,
        //         'requestType' => "payWithATM",
        //         'signature' => $signature,
        //         'lang' => 'vi');
        //     $result = $this->execPostRequest($endpoint, json_encode($data));
            
        //     // check signature response
        //     if(!empty($result)){
                
        //     } else {
        //         return redirect()
        //             ->route('cart')
        //             ->with('error', $response['message'] ?? 'Something went wrong.');
        //     }
        // }
        // dd($result);
    }

    public function processTransaction1() {

        $total = \Session::get('total_after');
        $id = \Session::get('cart_Id');

        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $orderInfo = "Thanh toán qua MoMo";
        $amount = $total * 23000;
        $orderId = time() . "";
        $_POST['orderId'] = $orderId;
        // $redirectUrl = "http://127.0.0.1:8000/cart";
        $ipnUrl = "http://127.0.0.1:8000/cart";
        $extraData = "";


        $requestId = time() . "";
        $requestType = "payWithATM";
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . env('MOMO_ACCESS_KEY') . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . env('MOMO_PARTNER_CODE') . "&redirectUrl=" . \URL::to('momo-success1/' . $id) . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, env('MOMO_SECRET_KEY'));
        $data = array('partnerCode' => env('MOMO_PARTNER_CODE'),
            'partnerName' => "Test",
            "storeId" => "BoxGameStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => \URL::to('momo-success1/' . $id),
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature);
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json
        //Just a example, please check more in there

        return redirect()->to($jsonResult['payUrl']);

    }

    public function successTransaction1($id) {
        DB::table('cart_master')->where('cartId', $id)->update(['status' => 1]);
        $gameId = DB::table('cart_details')->where('cartId', $id)->first()->gameId;
        foreach(Cart::content() as $cart) {
            if($cart->id == $gameId) {
                $rowId = $cart->rowId;
                Cart::remove($rowId);
                $userID = Auth::user()->userID;
                DB::table('store_cart')->where('userID', $userID)->where('gameId', $gameId)->delete();
            }
        }
        return redirect()->route('details', ['id' => $gameId]);
        // $requestId = time()."";
        // $endpoint = "https://test-payment.momo.vn/v2/gateway/api/query";
        // $result = 0; 
        // if (!empty($_POST)) {
        //     $orderId = $_POST["orderId"];;// Mã đơn hàng cần kiểm tra trạng thái
        
        //     //before sign HMAC SHA256 signature
        //     $rawHash = "accessKey=".env('MOMO_ACCESS_KEY')."&orderId=".$orderId."&partnerCode=".env('MOMO_PARTNER_CODE')."&requestId=".$requestId;
        //     // echo "<script>console.log('Debug Objects: " . $rawHash . "' );</script>";
        
        //     $signature = hash_hmac("sha256", $rawHash, env('MOMO_SECRET_KEY'));
        
        //     $data = array('partnerCode' => env('MOMO_PARTNER_CODE'),
        //         'requestId' => $requestId,
        //         'orderId' => $orderId,
        //         'requestType' => "payWithATM",
        //         'signature' => $signature,
        //         'lang' => 'vi');
        //     $result = $this->execPostRequest($endpoint, json_encode($data));
            
        //     // check signature response
        //     if(!empty($result)){
                
        //     } else {
        //         return redirect()
        //             ->route('cart')
        //             ->with('error', $response['message'] ?? 'Something went wrong.');
        //     }
        // }
        // dd($result);
    }
}
