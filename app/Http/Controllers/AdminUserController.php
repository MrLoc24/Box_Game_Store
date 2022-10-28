<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    //View All Users
    public function index()
    {
<<<<<<< Updated upstream
        $users = DB::table('users')->get();
        return view('admin.user.index', ['users' => $users]);
=======
        $users = User::all();
        return view('admin.user.index')->with(['users' => $users]);
>>>>>>> Stashed changes
    }
}