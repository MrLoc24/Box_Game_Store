<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use File;

class AdminGameController extends Controller
{
    public function index()
    {
        $games = DB::table('game')->get();
        return view('admin.game.index', ['games' => $games]);
    }
    public function create()
    {
        return view('admin.game.create');
    }
    public function store(Request $request)
    {
        $path_icon = public_path() . '/img/game/' . $request->input('gameName') . '/icon';
        $path_gameplay = public_path() . '/img/game/' . $request->input('gameName') . '/gameplay';
        File::makeDirectory($path_icon, 0777, true, true);
        File::makeDirectory($path_gameplay, 0777, true, true);
        $data_game = array();
        $data_game['gameId'] = $request->input('gameName');
        $data_game['description'] = $request->input('gameDescription');
        $data_game['price'] = $request->input('gamePrice');
        $data_game['release_date'] = $request->input('gameDate');
        $data_game['developer'] = $request->input('gameDeveloper');
        $data_game['developer_web'] = $request->input('developerWebsite');
        $data_game['icon'] = $request->input('icon');
        $getIcon = $request->file('icon');
        $getGameplay = $request->file('gameplay');
        if ($getIcon) {
            $get_name_picture = 'icon.jpg';
            $data_game['icon'] = "img/game/" . $request->input('gameName') . "/icon/" . $get_name_picture;
            $getIcon->move("img/game/" . $request->input('gameName') . "/icon/", $get_name_picture);
        }
        if ($getGameplay) {
            foreach ($getGameplay as $key => $value) {
                $get_name_picture = 'gameplay' . $request->input('gameName') . $key . '.jpg';
                $value->move("img/game/" . $request->input('gameName') . "/gameplay/", $get_name_picture);
            }
        }
        $data_game['gameplay'] = 'img/game/' . $request->input('gameName') . '/gameplay/';
        DB::table('game')->insert($data_game);
        if ($request->all()) {
            return redirect()->route('home')->with('success', "Add game successfully!");
        } else {
            return redirect('admin/game/create')->with('error', "Add game failed!");
        }
    }
}