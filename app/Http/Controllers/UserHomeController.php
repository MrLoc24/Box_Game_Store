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
        return view('home.index')->with('game', $game);
    }
    public function detail($id)
    {
        $sys_req = DB::table('system_requirement')->where('gameId', $id)->get();
        $game = DB::table('game')->where('gameId', $id)->first();
        $cate = DB::table('category')->where('gameId', $id)->get();
        return view('home.game.details', compact('game', 'cate', 'sys_req'))->with(['gameName' =>  str_replace('_', ' ', str_replace('__', ': ', $game->gameId))]);
    }
}