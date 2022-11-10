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
        $genre = $id;
        return view('home.browse.type', compact('game', 'type', 'platform', 'genre'));
    }
    public function platform($id)
    {
        $game = DB::table('game')->join('system_requirement', 'game.gameId', '=', 'system_requirement.gameId')->where('system_requirement.os', $id)->get();
        $os = $id;
        $type = DB::table('type')->get();
        $platform = DB::table('system_requirement')->groupBy('os')->get();
        return view('home.browse.platform', compact('game', 'type', 'platform', 'os'));
    }
}