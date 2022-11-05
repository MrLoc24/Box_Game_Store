<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Session\Session;

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
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return redirect('login')->with('error', 'Opps! You have entered invalid
        credentials');
    }

    public function logout(Request $request) {

        Auth::user()->forceFill([
            'status' => 0,
        ])->save(); 
        
        // $datas =  Cart::content();
        
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // foreach ($datas as $data) {
        //     Cart::add([
        //         'id' => $data->id,
        //         'qty' => $data->qty,
        //         'name' => $data->name,
        //         'price' => $data->price,
        //         'weight' => $data->weight,
        //         'options' => ['image' => $data->options->image] ,
        //     ]);
        // }

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
