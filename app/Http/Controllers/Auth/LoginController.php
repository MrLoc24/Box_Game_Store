<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login()
    {
        return view('user.auth.login');
    }

    public function authenticate(Request $request)
    {

        //$credentials = $request->only('userID', 'password');
        $displayname = $request->display_name;
        $password = $request->password;
        $remember = $request->has('remember');
        //Login with userID or email
        //$field = filter_var($displayname, FILTER_VALIDATE_EMAIL) ? 'email' : 'userID';
        if (Auth::attempt(['userID' => $displayname, 'password' => $password], $remember)) {
            $request->session()->regenerate();
            Auth::user()->forceFill([
                'status' => 1,
            ])->save();

            $userID = Auth::user()->userID;
            $store_cart = DB::table('store_cart')->where('userID', $userID)->get();

            foreach($store_cart as $key => $value) {
                $gameId = $value->gameId;
                $game = DB::table('game') 
                    ->where('gameId', $gameId)
                    ->first();

                $data = array();    
                $data['id'] = $game->gameId;
                $data['qty'] = 1;
                $data['name'] = $game->gameId;
                $data['price'] = $game->price;
                $data['weight'] = 1;
                $data['options']['image'] = $game->icon;
                $data['options']['sale'] = "$game->sale";

                Cart::add($data);
            }
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return redirect('login')->with('error', 'Opps! You have entered invalid
        credentials');
    }

    public function logout(Request $request) {

        Auth::user()->forceFill([
            'status' => 0,
        ])->save(); 
        
        $userID = Auth::user()->userID;

        $carts = Cart::content();

        DB::table('store_cart')->where('userID', $userID)->delete();

        foreach($carts as $cart) {
            DB::table('store_cart')->insert([
                'userID' => $userID,
                'gameId' => $cart->id
            ]);
        }
        
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function logoutEverywhere(Request $request) {
        if (! Hash::check($request->password, Auth::user()->password)) {
            return redirect()->route('passwordandsecurity')->with('error1', 'The provided password does not match your current password.');
        }
        Auth::logoutOtherDevices($request->password);
        return redirect()->route('passwordandsecurity')->with('status1', 'Signout successfully !');
    }
}
