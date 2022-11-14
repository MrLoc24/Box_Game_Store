<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminCategory;
use DB;
use File;

class AdminCategoryController extends Controller
{
    //View all categories
    public function index()
    {
        $type = DB::table('type')->get();
        return view('admin.category.index', ['type' => $type]);
    }
    //Add new game type
    public function store(AdminCategory $request)
    {
        foreach ($request->input('type') as $key => $value) {
            $data_type = array();
            $data_type['type'] = $request->input('type')[$key];
            $getImage = $request->file("image")[$key];
            if ($getImage) {
                $get_name_image = 'type_' . str_replace(' ', '_', $value) . '.jpg';
                $data_type['image'] = 'img/type/' . $get_name_image;
                $getImage->move('img/type/', $get_name_image);
            }
            if ($request->all()) {
                DB::table('type')->insert($data_type);
            } else {
                return redirect()->back();
            }
        }
        return redirect('admin/category/view')->with('success', 'Add new type successfully');
    }
    //Edit game type
    public function edit(Request $request, $id)
    {
        $previousPic = $request->input('pre_pic');
        $data_edit = array();
        $data_edit['type'] = str_replace(' ', '_', $request->input('typeEdit'));
        $getImage = $request->file("typeEditImage");
        //If user choose new image
        if ($getImage) {
            unlink($previousPic);
            $get_name_image = 'type_' . str_replace(' ', '_', $request->input('typeEdit')) . '.jpg';
            $data_edit['image'] = 'img/type/' . $get_name_image;
            $getImage->move('img/type/', $get_name_image);
            DB::table('type')->where('type', $id)->update($data_edit);
            return redirect('admin/category/view')->with('success', 'Update successfully!');
        } else {
            DB::table('type')->where('type', $id)->update($data_edit);
            return redirect('admin/category/view')->with('success', 'Update successfully!');
        }
    }
    //Delete game type
    public function delete($id)
    {
        $imageName = 'type_' . str_replace(' ', '_', $id) . '.jpg';
        File::delete('img/type/' . $imageName);
        DB::table('type')->where('type', $id)->delete();
        return redirect('admin/category/view')->with('success', 'Delete successfully!');
    }
}