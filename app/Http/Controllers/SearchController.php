<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        if ($request->ajax()) {

            $output = "";
            if ($request->search != null) {
                $name_game = str_replace(':', '__', str_replace(' ', '_', $request->input('search')));
                $results = DB::table('game')->where('gameId', 'LIKE', '%' . $name_game . '%')->get();
                if ($results) {
                    foreach ($results as $product) {

                        $output .=
                            '<div class="result">
                                <a href="/game/' . $product->gameId . '">
                                <img class="card-img-top" src="' . asset("$product->icon ") . '"  alt="Card image cap">
                                <h5 class="card-title">' . str_replace('_', ' ', str_replace('__', ': ', $product->gameId)) . '</h5>
                                </a>
                            </div>

                  ';
                    }
                    return response()->json($output);
                }
            }
            return response()->json($output);
        }
    }
}