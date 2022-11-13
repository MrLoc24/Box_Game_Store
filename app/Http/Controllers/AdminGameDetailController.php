<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use File;

class AdminGameDetailController extends Controller
{
    public function update($id, Request $request)
    {
        $data_game = array();
        $data_game['gameId'] = $id;
        $data_game['description'] = $request->input('detailDesc');
        $data_game['price'] = $request->input('detailPrice');
        $data_game['sale'] = $request->input('detailSale');
        $data_game['release_date'] = $request->input('detailDate');
        $data_game['developer'] = $request->input('detailDev');
        $data_game['developer_web'] = $request->input('detaildevWeb');
        $data_game['about'] = $request->input('detailAbout');

        DB::table('game')->where('gameId', $id)->update($data_game);
        if ($request->all()) {
            return redirect('admin/game/view/' . $id)->with('success', 'Update game successfully!');
        } else {
            return redirect('admin/game/editDetail/' . $id)->with('error', 'Update game failed!');
        }
    }
    public function updateType($id, Request $request)
    {
        $data_category = $request->input('category');
        DB::table('category')->where('gameId', $id)->delete();
        foreach ($data_category as $key => $value) {
            $data = array();
            $data['gameId'] = $id;
            $data['type'] = $value;
            DB::table('category')->insert($data);
        }
        return redirect('admin/game/view/' . $id)->with('success', 'Update category successfully');
    }
}