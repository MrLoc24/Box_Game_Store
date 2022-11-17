<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class DeleteUserController extends Controller
{
    public function delete()
    {

        DB::table('store_cart')->where('userID', Auth::user()->userID)->delete();
        Cart::destroy();

        User::destroy(Auth::user()->userID);
        if (Auth::user()->image == 'assets_home\images\useravatar\avatardefault.jpg') {
            return redirect()->route('homeuser');
        } else {
            $image_path = public_path() . '\\' . Auth::user()->image;
            unlink($image_path);
        }

        return redirect()->route('homeuser');
    }
}