<?php

namespace App\Http\Controllers;

use App\Game;
use App\Genre;
use App\Rating;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

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

        $itemPerPage = 6;

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
//        $rate = Rating::where("game_id","=",$id)->avg("rating");
//
//        if($rate == null){
            return view('detail', compact('game'));
//        }else{
//            return view('detail', compact('game','rate'));
//        }
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
        $rules = [
            'name' => 'required|min:3|max:255',
            'price' =>'required|min:1|numeric',
            'picture' => 'required|image'
        ];

        //validasi
        $validation = Validator::make($r->all(), $rules);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation);
        }
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

    public function updateGame(Request $r)
    {


        $game = Game::find($r->update_id);

        $game-> name = $r->name;
        $game-> price = $r->price;
        $game-> genre_id = $r->genre;
        $game-> rdate = $r->rdate;
        $game->picture = 'games/'.$r->picture;

        $game->save();

        return redirect ('managegame');
    }

    public function delete($id)
    {
        $game = Game::find($id);

        $game->delete();

        return redirect('managegame');
    }

//    public function addRate(Request $r){
//        $rates = new Rating();
//        $rates->user_id = Auth::user()->id;
//        $rates->rating = $r->input("rating");
//        $rates->game_id = $r->input("id");
//        $rates->save();
//
//        return redirect()->back();
//    }

}
