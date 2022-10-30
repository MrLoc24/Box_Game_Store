<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\WelcomEmailNotification;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register() {
        return view('user.auth.register');
    }

    public function store(Request $request) {

        $user = User::create([
            'userID' => $request->display_name,
            'username' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->notify(new WelcomEmailNotification());

        return redirect('login')->with('status', 'Register user successfully');
    }

}
