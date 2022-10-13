<?php


namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Statistical;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminLoginController extends Controller
{

    public function login()
    {
        return view('admin.login');
    }

    public function checkLogin(Request $request)
    {
        $userName = $request->input('txtName');
        $password = $request->input('txtPassword');
        $user = DB::table('account_admin')->where(['name' => $userName])->first();
        if ($user != null && $user->password == $password) {
            $request->session()->push("user", $user);
            return redirect()->route('home');
        } else {
            return view('admin.login')->with(['message' => 'Invalid ID and Password']);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect('admin');
    }
}