<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    //View All Users
    public function index()
    {
        return view('admin.user.index');
    }

    public function delete($id)
    {
        $user = User::where('userID', $id)->first();
        if ($user->image == 'assets_home/images/useravatar/avatardefault.jpg') {
            User::destroy($id);
            return redirect('admin/user/')->with('success', "Delete user successfully!");
        } else {
            User::destroy($id);
            $image_path = public_path().'\\'.$user->image; 
            unlink($image_path);
        }

        return redirect('admin/user/')->with('success', "Delete user successfully!");
    }
}