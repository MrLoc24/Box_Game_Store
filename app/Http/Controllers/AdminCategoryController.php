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
}