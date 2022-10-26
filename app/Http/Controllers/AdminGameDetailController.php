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
        $data_game['gameId'] = $request->input('detailID');
        $data_game['description'] = $request->input('detailDesc');
        $data_game['price'] = $request->input('detailPrice');
        $data_game['sale'] = $request->input('detailSale');
        $data_game['release_date'] = $request->input('detailDate');
        $data_game['developer'] = $request->input('detailDev');
        $data_game['developer_web'] = $request->input('detaildevWeb');
        $data_game['about'] = $request->input('detailAbout');
        
        DB::table('game')->where('gameId', $id)->update($data_game);
        if ($request->all()) {
            return redirect('admin/game/view/' . $id);
        } else {
            return redirect('admin/game/editDetail/' . $id );
        }
    }
}

