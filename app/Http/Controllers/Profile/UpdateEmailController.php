<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UpdateEmailNotification;

class UpdateEmailController extends Controller
{
    public function update(Request $request) {

        Auth::user()->forceFill([
            'email' => $request->email,
        ])->save();

        Auth::user()->notify(new UpdateEmailNotification());

        return redirect('profile')->with('status', 'Update email successfully!');
    }
}
