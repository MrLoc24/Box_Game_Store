<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use File;

class AdminGameReqController extends Controller
{
    //Edit game requirements
    public function edit($id, $os)
    {
        $system_req = DB::table('system_requirement')->where('gameId', $id)->where('os', $os)->first();
        return view('admin.systemReq.editReq', ['system_req' => $system_req]);
    }
    public function update($id, $os, Request $request)
    {
        $data_system_req = array();
        $data_system_req['os'] = $request->input('os');
        $data_system_req['version'] = $request->input('version');
        $data_system_req['chip'] = $request->input('chipset');
        $data_system_req['ram'] = $request->input('ram');
        $data_system_req['graphic'] = $request->input('vga');
        $data_system_req['storage'] = $request->input('storage');
        DB::table('system_requirement')->where('gameId', $id)->where('os', $os)->update($data_system_req);
        if ($request->all()) {
            return redirect('admin/game/view/' . $id);
        } else {
            return redirect('admin/game/editRequire/' . $id . '/' . $os);
        }
    }
}