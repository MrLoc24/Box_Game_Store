<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminUserController extends Controller
{
    //View All Users
    public function index()
    {
        $users = DB::table('users')->get();
        return view('admin.user.index', ['users' => $users]);
    }
}