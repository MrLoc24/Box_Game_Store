<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminSystemRequirement;
use DB;


class AdminGameReqController extends Controller
{
    //Update game requirements
    public function update($id, $os, AdminSystemRequirement $request)
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
            return redirect('admin/game/view/' . $id)->with('success', 'Platform updated');
        } else {
            return redirect('admin/game/view/' . $id)->with('errors', 'Something went wrong');
        }
    }
    //Add game requirements
    public function addNew($id, AdminSystemRequirement $request)
    {
        $data_system_req_add = array();
        $data_system_req_add['gameId'] = $id;
        $data_system_req_add['os'] = $request->input('os');
        $data_system_req_add['version'] = $request->input('version');
        $data_system_req_add['chip'] = $request->input('chipset');
        $data_system_req_add['ram'] = $request->input('ram');
        $data_system_req_add['graphic'] = $request->input('vga');
        $data_system_req_add['storage'] = $request->input('storage');
        DB::table('system_requirement')->where('gameId', $id)->insert($data_system_req_add);
        if ($request->all()) {
            return redirect('admin/game/view/' . $id)->with('success', 'Platform added');
        } else {
            return redirect('admin/game/view/' . $id)->with('errors', 'Something went wrong');
        }
    }
    //Delete game requirements
    public function delete($id, $os)
    {
        DB::table('system_requirement')->where('gameId', $id)->where('os', $os)->delete();
        return redirect('admin/game/view/' . $id);
    }
}