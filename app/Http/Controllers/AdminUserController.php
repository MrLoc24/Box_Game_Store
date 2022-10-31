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
        $users = User::all();
        return view('admin.user.index')->with(['users' => $users]);
    }

    public function delete($id)
    {
        User::destroy(Auth::user()->userID);
        if (Auth::user()->image == 'assets_home\images\useravatar\avatardefault.jpg') {
            return redirect('admin/user/')->with('success', "Delete user successfully!");
        } else {
            $image_path = public_path().'\\'.Auth::user()->image; 
            unlink($image_path);
        }

        return redirect('admin/user/')->with('success', "Delete user successfully!");
    }
}