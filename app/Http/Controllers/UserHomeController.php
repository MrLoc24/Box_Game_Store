<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserHomeController extends Controller
{
    public function index()
    {
        $mostSold = DB::table('game')->orderBy('number_sold', 'desc')->take(5)->get();
        $game = DB::table('game')->get();

        return view('home.index', compact('game', 'mostSold'));
    }
    public function browse()
    {
        $game = DB::table('game')->get();
        $type = DB::table('type')->get();
        return view('home.browse.index', compact('game', 'type'));
    }
    public function detail($id)
    {
        $rating = DB::table('rating')->where('gameId', $id)->get();
        $star = DB::table('rating')->where('gameId', $id)->avg('star');
        $sys_req = DB::table('system_requirement')->where('gameId', $id)->get();
        $game = DB::table('game')->where('gameId', $id)->first();
        $cate = DB::table('category')->where('gameId', $id)->get();
        $avg_star = number_format($star, 1, '.', '');
        return view('home.game.details', compact('game', 'cate', 'sys_req', 'rating', 'avg_star'))->with(['gameName' =>  str_replace('_', ' ', str_replace('__', ': ', $game->gameId))]);
    }
}