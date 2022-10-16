<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequestForm;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {
        $admin = DB::table('account_admin')->where(['name' => session('admin')])->first();
        return view('admin.index')->with('admin', $admin);
    }
    public function update(AdminRequestForm $request, $id)
    {
        $data = array();

        $data['adminId'] = $request->input('loginName');
        $data['email'] = $request->input('adminEmail');
        $data['name'] = $request->input('adminName');
        $data['password'] = $request->input('adminPassword');
        $get_image = $request->file('adminPicture');
        if ($get_image) {
            $get_name_picture = 'admin' . $id . '.jpg';
            $data['image'] = 'img/admin/' . $get_name_picture;
            $get_image->move('img/admin/', $get_name_picture);
        }
        DB::table('account_admin')->where(['adminId' => $id])->update(
            $data
        );
        session()->forget('admin');
        session()->push("admin", $request->input('adminName'));
        if ($request->all()) {

            return redirect()->route('home')->with('success', "Update product successfully!");
        } else {
            return redirect()->route('home')->with('error', "Update product failed!");
        }
    }
}