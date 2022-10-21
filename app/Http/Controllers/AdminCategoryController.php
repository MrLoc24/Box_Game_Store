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
        foreach ($request->input('type') as $type) {
            DB::table('type')->insert([
                'type' => $type
            ]);
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