<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminCategoryController extends Controller
{
    //View all categories
    public function index()
    {
        $type = DB::table('type')->get();
        return view('admin.category.index', ['type' => $type]);
    }
    //Add new game type
    public function store(Request $request)
    {
        foreach ($request->input('type') as $key => $value) {
            $data_type = array();
            $data_type['type'] = $value;
            $getImage = $request->file("image")[$key];
            if ($getImage) {
                $get_name_image = 'type_' . str_replace(' ', '_', $value) . '.jpg';
                $data_type['image'] = 'img/type/' . $get_name_image;
                $getImage->move('img/type/', $get_name_image);
            }
            DB::table('type')->insert($data_type);
        }
        return redirect('admin/category/view');
    }
    //Edit game type
    public function edit(Request $request, $id)
    {
        DB::table('type')->where('type', $id)->update([
            'type' => $request->input('typeEdit')
        ]);
        return redirect('admin/category/view');
    }
    //Delete game type
    public function delete($id)
    {
        DB::table('type')->where('type', $id)->delete();
        return redirect('admin/category/view');
    }
}