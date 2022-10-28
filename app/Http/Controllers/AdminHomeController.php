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
        $admin = DB::table('account_admin')->where(['name' => session('admin')])->orWhere(['name' => session('boss')])->first();
        return view('admin.index')->with('admin', $admin);
    }
    public function update(AdminRequestForm $request, $id)
    {
        $data = array();
        $data['adminId'] = $request->input('loginName');
        $data['email'] = $request->input('adminEmail');
        $data['name'] = $request->input('adminName');
        $get_image = $request->file('adminPicture');
        if ($get_image) {
            $get_name_picture = 'admin' . $id . '.jpg';
            $data['image'] = 'img/admin/' . $get_name_picture;
            $get_image->move('img/admin/', $get_name_picture);
        } else { //
            $data['image'] = null;
        }
        DB::table('account_admin')->where(['adminId' => $id])->update(
            $data
        );
        $admin = DB::table('account_admin')->where(['adminId' => $id])->first();
        if ($admin->image) {
            session()->forget('adminImg');
            session()->push("adminImg", $admin->image);
        } else {
            session()->forget('adminImg');
            session()->push("adminImg", 'img/admin/default.png');
        }
        session()->forget('admin');
        session()->push("admin", $admin->name);
        if ($request->all()) {

            return redirect()->route('home')->with('success', "Update product successfully!");
        } else {
            return redirect()->route('home')->with('error', "Update product failed!");
        }
    }
    // Change password
    public function changePass(Request $request, $id)
    {
        $data = array();
        $data['password'] = $request->input('adminPasswordNew');
        $admin = DB::table('account_admin')->where(['adminId' => $id])->first();
        if ($request->input('adminPassword') == $admin->password) {
            // Check password new
            if ($request->input('adminPasswordRetype') == $data['password']) {
                DB::table('account_admin')->where(['adminId' => $id])->update(
                    $data
                );
                $request->session()->forget('admin');
                return redirect('/admin');
            }
            return redirect()->route('home')->with('error', "Retype password incorrect!");
        }
    }
}