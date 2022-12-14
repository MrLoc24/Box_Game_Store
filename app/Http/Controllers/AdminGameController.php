<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminGameRequest;
use DB;
use File;

class AdminGameController extends Controller
{
    public function index()
    {
        $category = DB::table('category')->get();
        $games = DB::table('game')->get();
        return view('admin.game.index', ['games' => $games, 'category' => $category]);
    }
    public function create()
    {
        $type = DB::table('type')->get();
        return view('admin.game.create')->with('type', $type);
    }
    public function view($id)
    {
        $rating = DB::table('rating')->where('gameId', $id)->get();
        $category = DB::table('category')->where('gameId', $id)->get();
        $cate_all = DB::table('type')->get();
        $game = DB::table('game')->where('gameId', $id)->first();
        $system_req = DB::table('system_requirement')->where('gameId', $id)->get();
        return view('admin.game.view', ['game' => $game, 'category' => $category, 'rating' => $rating, 'system_req' => $system_req, 'cate_all' => $cate_all]);
    }
    public function store(AdminGameRequest $request)
    {
        //Add new game
        $name_game = str_replace(':', '__', str_replace(' ', '_', $request->input('gameName')));
        $path_icon = public_path() . '/img/game/' . $name_game . '/icon';
        $path_banner = public_path() . '/img/game/' . $name_game . '/banner';
        $path_gameplay = public_path() . '/img/game/' . $name_game . '/gameplay';
        File::makeDirectory($path_icon, 0777, true, true);
        File::makeDirectory($path_gameplay, 0777, true, true);
        File::makeDirectory($path_banner, 0777, true, true);
        $data_game = array();
        $data_game['gameId'] = $name_game;
        $data_game['description'] = $request->input('gameDescription');
        $data_game['about'] = $request->input('gameAbout');
        $data_game['price'] = $request->input('gamePrice');
        $data_game['sale'] = $request->input('sale');
        $data_game['release_date'] = $request->input('gameDate');
        $data_game['developer'] = $request->input('gameDeveloper');
        $data_game['developer_web'] = $request->input('developerWebsite');
        $data_game['icon'] = $request->input('icon');
        if ($request->input('topPage') == null) {
            $data_game['top_page'] = 0;
        } else {
            $data_game['top_page'] = 1;
        }
        // if ($request->input('comingSoon') == null) {
        //     $data_game['coming_soon'] = 0;
        // } else {
        //     $data_game['coming_soon'] = 1;
        // }

        $getIcon = $request->file('icon');

        $getGameplay = $request->file('gameplay');
        if ($getIcon) {
            $get_name_picture = 'icon.jpg';
            $data_game['icon'] = "img/game/" . $name_game . "/icon/" . $get_name_picture;
            $getIcon->move("img/game/" . $name_game . "/icon/", $get_name_picture);
        }
        $getBanner = $request->file('banner');
        if ($getBanner) {
            $get_name_picture = 'banner.jpg';
            $data_game['banner'] = "img/game/" . $name_game . "/banner/" . $get_name_picture;
            $getBanner->move("img/game/" . $name_game . "/banner/", $get_name_picture);
        }
        if ($getGameplay) {
            foreach ($getGameplay as $key => $value) {
                $get_name_picture = 'gameplay' . $name_game . $key . '.jpg';
                $value->move("img/game/" . $name_game . "/gameplay/", $get_name_picture);
            }
        }
        $data_game['gameplay'] = 'img/game/' . $name_game . '/gameplay/';
        //Add game category
        $data_category = $request->input('category');
        //Add game system requirement
        if ($request->all()) {
            DB::table('game')->insert($data_game);
            foreach ($data_category as $value) {
                $data_game_category = array();
                $data_game_category['gameId'] = $name_game;
                $data_game_category['type'] = $value;
                DB::table('category')->insert($data_game_category);
            }
            foreach ($request->input('os') as $key => $value) {
                $data_sys_req = array();
                $data_sys_req['gameId'] = $name_game;
                $data_sys_req['os'] = $request->input('os')[$key];
                $data_sys_req['version'] = $request->input('version')[$key];
                $data_sys_req['chip'] = $request->input('chipset')[$key];
                $data_sys_req['ram'] = $request->input('ram')[$key];
                $data_sys_req['graphic'] = $request->input('vga')[$key];
                $data_sys_req['storage'] = $request->input('storage')[$key];
                DB::table('system_requirement')->insert($data_sys_req);
            }
            return redirect('admin/game/view/' . $name_game)->with('success', 'Add game success');
        } else {
            return redirect('admin/game/create')->with('error', 'Error');
        }
    }
    public function delete($id)
    {
        $game = DB::table('game')->where('gameId', $id)->first();
        $path_game = public_path() . '/img/game/' . $game->gameId;
        File::deleteDirectory($path_game);
        DB::table('game')->where('gameId', $id)->delete();
        return redirect('admin/game/index')->with('success', "Delete game successfully!");
    }
}