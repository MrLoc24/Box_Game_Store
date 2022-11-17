<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\ChangedPasswordSuccess;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;

class UpdateUserPasswordController extends Controller
{
    public function update(Request $request)
    {
        if (! Hash::check($request->current_password, Auth::user()->password)) {
            return redirect()->route('passwordandsecurity')->with('error', 'The provided password does not match your current password.');
        }
        if (Hash::check($request->password, Auth::user()->password)) {
            return redirect()->route('passwordandsecurity')->with('error', 'Its your old password.');
        }
        Auth::user()->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

        event(new PasswordReset(Auth::user()));
        Auth::user()->notify(new ChangedPasswordSuccess());
            
        return redirect()->route('passwordandsecurity')->with('status', 'Change password successfully !');

    }
}
