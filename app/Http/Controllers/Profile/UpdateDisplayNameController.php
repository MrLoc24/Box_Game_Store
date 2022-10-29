<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateDisplayNameController extends Controller
{

    public function update(Request $request) {

        $newdisplayname = $request->new_displayname;
        Auth::user()->fill([
            'userID' => $newdisplayname,
        ])->save();

        // if (Auth::attempt(['userID' => $newdisplayname, 'password' => Auth::user()->password], Auth::user()->remember_token)) {
        //     $request->session()->regenerate();
        //     Auth::user()->forceFill([
        //         'status' => 1,
        //     ])->save();
        // }

        return redirect('login')->with('status', 'Update displayname success!');
    }
}
