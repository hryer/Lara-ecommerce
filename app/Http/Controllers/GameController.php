<?php

namespace App\Http\Controllers;

use App\Game;
use App\Genre;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class GameController extends Controller
{
    public function index()
    {
        $lowestPrice = Game::take(4)->orderBy('price','asc')->get();

        return view('index')->with(
            ['lowestPrice' => $lowestPrice]
        );
    }

    public function store(Request $request)
    {
        $action = $request->action;

        $itemPerPage = 4;

        $games = Game::paginate($itemPerPage);
        $genres = Genre::all();

        if(isset($request->by)){
            if($request->by == 'name'){
                $games = Game::where('name', 'like', "%$request->search%")->paginate($itemPerPage);
            }
            else if($request->by == 'genre'){
                $genres = Genre::where('name','like', "%$request->search%")->get()
                    ->map(function ($genre) {
                        return $genre->id;
                    });
                $games = Game::whereIn('genre_id', $genres)->paginate($itemPerPage);
            }
        }
        return view('store', compact('games', 'action','genres'));

    }

    public function detail($id){
        $game = Game::find($id);
        return view('detail', compact('game'));
    }

    public function newGame()
    {
        $genres = Genre::all();
        return view('newgame',compact('genres'));
    }

    public function manageGame()
    {
        $games = Game::all();

        return view('managegame')->with(
            ['games' => $games]
        );
    }

    public function insert(Request $r)
    {

        $game = new Game();

        $game->name = $r->name;
        $game->price = $r->price;
        $game->rdate = $r->rdate;
        $game->genre_id = $r->genre;
        $image = Input::file('picture');
        $file_name = $image->getClientOriginalName();
        $upload = Input::file('picture')->move('games', $file_name);
        $game->picture = 'games/'.$file_name;
        $game->save();

        return redirect('managegame');

    }

    public function updateView($id)
    {
        $game = Game::find ($id);
        $genres = Genre::all();

        return view ('updategame',compact('game','genres'));
    }

    public function updateGame($id)
    {
        //        $game = Game::find($r->id);
//
//        $game->name = $r->name;
//        $game->price = $r->price;
//        $game->rdate = $r->rdate;
//        $game->genre_id = $r->genre;
//        $image = Input::file('picture');
//        $file_name = $r->image;
//        $upload = Input::file('picture')->move('games', $file_name);
//        $game->picture = 'games/'.$file_name;
//
//        $game->save();
        $game = Game::find($id);

        $game-> name = Input::get('name');
        $game-> price = Input::get('price');
        $game-> genre_id = Input::get('genre');
        $game-> rdate = Input::get('rdate');
        $game-> picture = Input::get('picture');

        $game->save();

        return redirect ('managegame');
    }

    public function delete($id)
    {
        $game = Game::find($id);

        $game->delete();

        return redirect('managegame');
    }


}
