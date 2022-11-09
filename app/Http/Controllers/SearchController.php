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
                $results = DB::table('game')->where('gameId', 'LIKE', '%' . $request->input('search') . '%')->get();
            }
            if ($results) {
                foreach ($results as $key => $value) {
                    $output .=
                        '<div class="shop-card">
                                    <a href="/game/' . $value->gameId . '" class="card-banner">
                                        <img src="' . $value->icon . '" style="height:282px" loading="lazy"
                                            alt="' . $value->gameId . '" class="img-cover">
                                         ';
                    if ($value->sale) {
                        $output .= '<span class="badge" aria-label="20% off">-' . $value->sale . '%</span>';
                    }
                    $output .= '<div class="card-actions">
                                        <button class="action-btn">
                                            <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>
                                        </button>

                                        <button class="action-btn">
                                            <ion-icon name="star-outline" aria-hidden="true"></ion-icon>
                                        </button>
                                    </div>
                                    </a>
                                <div class="card-content">

                                    <span class="card-type">BASE GAME</span>

                                    <h3>
                                        <a href="/game/' . $value->gameId . '" class="card-title">' . str_replace('_', ' ', str_replace('__', ': ', $value->gameId)) . '</a>
                                    </h3>

                                    <div class="price">';

                    if ($value->price != 0) {
                        if ($value->sale != 0) {
                            $output .= '<del class="del">$' . $value->price . '</del>
                                <span class="span">$' . number_format($value->price * (1 - $value->sale / 100), 2, '.', '') . '</span>';
                        } else {
                            $output .= '<span class="span">$' . $value->price . '</span>';
                        }
                    } else { // free
                        $output .= '<span class="span">FREE</span>';
                    }
                    $output .= '</div>
                            </div>
                                </div>';
                }
                return response()->json($output);
            }
        }
    }
}