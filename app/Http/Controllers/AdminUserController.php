<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    //View All Users
    public function index()
    {
        $users = User::all();
        return view('admin.user.index')->with(['users' => $users]);
    }
}