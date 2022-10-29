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
    public function delete($id)
    {
        DB::table('account_admin')->where(['adminId' => $id])->delete();
        return redirect('admin/manager')->with('message', "Delete successfully!");
    }
    public function resetPassword($id)
    {
        $password = 12345678;
        DB::table('account_admin')->where(['adminId' => $id])->update($password);
        return redirect('admin/manager')->with('message', "Reset password to " . $password . "successfully!");
    }
}