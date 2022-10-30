<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AdminAccountController extends Controller
{
    public function index()
    {
        $admin = DB::table('account_admin')->get();
        return view('admin.manager.index')->with('admins', $admin);
    }
    //ADD NEW MANAGER
    public function store(Request $request)
    {
        $data = array();
        $data['adminId'] = $request->adminId;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['phone'] = $request->phone;
        $data['role'] = $request->role;
        $data['status'] = 1;
        $data['created_at'] = now();
        DB::table('account_admin')->insert($data);
        return redirect('admin/manager')->with('message', "Add successfully!");
    }
    //DELETE MANAGER
    public function delete($id)
    {
        DB::table('account_admin')->where(['adminId' => $id])->delete();
        return redirect('admin/manager')->with('message', "Delete successfully!");
    }
    // public function resetPassword(Request $request, $id)
    // {
    //     $password = $request->input('password');
    //     if ($password == $request->input('retypePassword')) {
    //         DB::table('account_admin')->where(['adminId' => $id])->update(['password' => $password]);
    //         return redirect('admin/manager')->with('message', "Reset password successfully!");
    //     } else {
    //         return redirect('admin/manager')->with('message', "Password and confirm password are not the same!");
    //     }
    // }
    //RESET PASSWORD
    public function resetPassword($id)
    {
        DB::table('account_admin')->where(['adminId' => $id])->update(['password' => '12345678']);
        return redirect('admin/manager')->with('message', "Reset password successfully!");
    }
}