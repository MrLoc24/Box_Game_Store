<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserBrowseController extends Controller
{
    public function type($id)
    {
        $game = DB::table('game')->join('category', 'game.gameId', '=', 'category.gameId')->where('category.type', $id)->get();
        $type = DB::table('type')->get();
        $platform = DB::table('system_requirement')->groupBy('os')->get();
        return view('home.browse.type', compact('game', 'type', 'platform'));
    }
}