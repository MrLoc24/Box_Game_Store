<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use File;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        if ($request->ajax()) {

            $output = '';

            $results = DB::table('game')->where('gameId', '%' . $request->search . '%')->get();

            if ($results) {

                foreach ($results as $product) {

                    $output .=
                        '<div class="card-body">
                        <img class="card-img-top" src="{{asset("' . $product->icon . '")}}" alt="Card image cap">
                        <h5 class="card-title"><b>' . $product->gameId . '</b></h5>
                        <h5 class="card-title">$' . $product->price . '</h5>
                        </div>';
                }
                return response()->json($output);
            }
        }

        return view('layouts.dashboard')->with('results', $results);
    }
}