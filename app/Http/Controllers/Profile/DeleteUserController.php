<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteUserController extends Controller
{
    public function delete() {
        
        User::destroy(Auth::user()->userID);

        return redirect()->route('homeuser');
    }
}
