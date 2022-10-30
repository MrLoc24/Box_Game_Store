<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UpdateProfileController extends Controller
{

    public function update(Request $request) {
        if ($request->name) {
            Auth::user()->forceFill([
                'username' => $request->name,
            ])->save();
        }

        if ($request->file('ava')) {
            $file = $request->file('ava');
            $filename = Auth::user()->userID . 'avatar.' . $file->extension();
            $file->move("assets_home\images\useravatar", $filename);
            Auth::user()->forceFill([
                'image' => "assets_home\images\useravatar\\".$filename,
            ])->save();
        }

        return redirect('profile')->with('status1', 'Update profile successfully!');
    }
}
