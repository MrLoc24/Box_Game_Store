<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminGameController extends Controller
{
    public function index()
    {
        return view('admin.game.index');
    }
    public function create()
    {
        return view('admin.game.create');
    }
    public function store()
    {
    }
}