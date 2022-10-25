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
        $game = DB::table('game')->where('gameId', $id)->first();
        return view('home.game.details', compact('game'))->with(['gameName' =>  str_replace('_', ' ', str_replace('__', ': ', $game->gameId))]);
    }
}