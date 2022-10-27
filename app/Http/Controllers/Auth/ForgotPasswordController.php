<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function getEmail() {
        return view('user.auth.password.forgetpassword');
    }

    public function postEmail(Request $request) {

        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);

        // $request->validate([
        //     'email' => 'required|email|exists:users',
        // ]);

        // $token = Str::random(60);
        // DB::table('password_resets')->insert(
        //     ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        // );
        
        // // Mail::send(
        // //     'auth.password.verify',
        // //     ['token' => $token],
        // //     function ($message) use ($request) {
        // //         $message->from('email@example.com');
        // //         $message->to($request->email);
        // //         $message->subject('Reset Password Notification');
        // //     }
        // // );
        // return back()->with('status', 'We have e-mailed your password reset link!');
    }

}
