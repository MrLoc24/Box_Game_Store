<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class UserHomeController extends Controller
{
    public function index()
    {
        $game = DB::table('game')->get();
        return view('user.home.index');
    }
}