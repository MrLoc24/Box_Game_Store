<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class BrowseAddCart extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'gameId';
    public $sortDirection = 'asc';
    public $gametypelist;
    public $gametypeIds = array();
    public $gameoslist;
    public $gameosIds = array();
    public $title = "Games List";

    public function mount() {
        $gamelistIds = array();
        $games = DB::table('game')->get();
        foreach ($games as $key => $game) {
            array_push($gamelistIds, $game->gameId);
        }
        $this->gametypelist = $gamelistIds;
        $this->gameoslist = $gamelistIds;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortByType($type)
    {
        $categorys = DB::table('category')->where('type', $type)->get();
        foreach ($categorys as $key => $category) {
            $gameId = $category->gameId;
            if (!in_array($gameId, $this->gametypeIds)) {
                array_push($this->gametypeIds, $gameId);
            }
        }
        $this->gametypelist = $this->gametypeIds;
    }

    public function sortByGenre($genre) 
    {
        $this->title = $genre;
        $gamelistIds = array();
        $games = DB::table('game')->join('category', 'game.gameId', '=', 'category.gameId')->where('category.type', $genre)->get();
        foreach($games as $key => $game) {
            array_push($gamelistIds, $game->gameId);
        }
        $this->gametypelist = $gamelistIds;
    }

    public function sortByOs($os)
    {
        $systems = DB::table('system_requirement')->where('os', $os)->get();
        foreach ($systems as $key => $system) {
            $gameId = $system->gameId;
            if (!in_array($gameId, $this->gameosIds)) {
                array_push($this->gameosIds, $gameId);
            }
        }
        $this->gameoslist = $this->gameosIds;
    }

    public function sortBy($field, $direction) 
    {
        $this->sortField = $field;
        $this->sortDirection = $direction;
    }

    public function render()
    {
        $game = DB::table('game')
            ->whereIn('gameId', $this->gametypelist)
            ->whereIn('gameId', $this->gameoslist)
            ->where('gameId', 'like', '%'.str_replace(':', '__', str_replace(' ', '_', $this->search)).'%')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(12);
        $type = DB::table('type')->get();
        $platform = DB::table('system_requirement')->groupBy('os')->get();
        $gameIds = array();
        if (Auth::check()) {
            $cartMs = DB::table('cart_master')->where('userID', Auth::user()->userID)->where('status', 1)->get();
            foreach ($cartMs as $keyM => $cartM) {
                $cartDs = DB::table('cart_details')->where('cartId', $cartM->cartId)->get();
                foreach ($cartDs as $keyD => $cartD) {
                    array_push($gameIds, $cartD->gameId);
                } 
            }
        }    
        return view('livewire.browse-add-cart', compact('game', 'gameIds', 'type', 'platform'));
    }

    public function addToCart($gameId) 
    {
        $game = DB::table('game') 
            ->where('gameId', $gameId)
            ->first();

        $data = array();    
        $data['id'] = $game->gameId;
        $data['qty'] = 1;
        $data['name'] = $game->gameId;
        $data['price'] = $game->price;
        $data['weight'] = 1;
        $data['options']['image'] = $game->icon;
        $data['options']['sale'] = "$game->sale";

        Cart::add($data);

        $userID = Auth::user()->userID;

        DB::table('store_cart')->insert([
            'userID' => $userID,
            'gameId' => $gameId
        ]);

        $this->emit('cart_updated');
    }

    public function removeCart($gameId) 
    {
        foreach(Cart::content() as $cart) {
            if($cart->id == $gameId) {
                $rowId = $cart->rowId;
                Cart::remove($rowId);
                $userID = Auth::user()->userID;
                DB::table('store_cart')->where('userID', $userID)->where('gameId', $gameId)->delete();
            }
        }
        $this->emit('cart_updated');
    }
}
