<?php


namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Statistical;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $checkbox = $request->has('checkRemember');
        $admin = DB::table('account_admin')->where(['adminId' => $userName])->first();
        if ($admin != null && $admin->password == $password) {
            $request->session()->push("admin", $admin->name);
            $request->session()->push("adminImg", $admin->image);
            return redirect()->route('home');
        } else {
            return view('admin.login')->with(['message' => $password]);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect('admin');
    }
}