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
        $previousPic = $request->input('prev_pic');
        $data = array();
        $data['adminId'] = $request->input('loginName');
        $data['email'] = $request->input('adminEmail');
        $data['name'] = $request->input('adminName');
        $get_image = $request->file('adminPicture');
        if ($get_image) {
            unlink($previousPic);
            $get_name_picture = 'admin' . $id . '.jpg';
            $data['image'] = 'img/admin/' . $get_name_picture;
            $get_image->move('img/admin/', $get_name_picture);
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
        if ($admin->role == 'boss') {
            session()->forget('boss');
            session()->push('boss', $admin->name);
        } else {
            session()->forget('admin');
            session()->push("admin", $admin->name);
        }
        if ($request->all()) {

            return redirect()->route('home')->with('success', "Update successfully!");
        } else {
            return redirect()->route('home')->with('error', "Update failed!");
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
                $request->session()->forget('boss');
                $request->session()->forget('adminImg');
                $request->session()->invalidate();
                return redirect("/admin")->with(['message' => "Change password successfully!"]);
            }
            return back()->with('error', "Retype password incorrect!");
        }
        return back()->with('error', "Old password incorrect!");
    }
}