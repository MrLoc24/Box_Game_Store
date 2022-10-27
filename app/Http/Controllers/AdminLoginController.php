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
        $checkbox = $request->has('checkRemember');
        $admin = DB::table('account_admin')->where('adminId', $userName)->orWhere('email', $userName)->first();
        if ($admin != null && $admin->password == $password) {
            $request->session()->push("admin", $admin->name);
            if ($admin->image != null) {
                $request->session()->push("adminImg", $admin->image);
            } else {
                $request->session()->push("adminImg", 'img/admin/default.png');
            }
            return redirect()->route('home');
        } else {
            return view('admin.login')->with(['message' => 'Wrong username or password']);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        return redirect('admin');
    }
}