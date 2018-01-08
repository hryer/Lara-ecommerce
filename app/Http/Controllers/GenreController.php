<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    public function manageGenre()
    {
        $genres = Genre::all();

        return view('managegenre')->with(
            ['genres' => $genres]
        );
    }
    public function newGenre()
    {
        return view('newgenre');
    }

    public function insert(Request $r)
    {
        $rules = [
            'name' => 'required|min:3|max:255',
        ];

        //validasi
        $validation = Validator::make($r->all(), $rules);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation);
        }

        $genre = new Genre();

        $genre->name = $r->name;

        $genre->save();

        return redirect('managegenre');

    }

    public function updateView($id)
    {
        $genre = Genre::find ($id);

        return view ('updategenre') -> with(
            ['genre' => $genre]
        );
    }

    public function updateGenre($id)
    {
        $genre = Genre::find($id);

        $genre-> name = Input::get('name');

        $genre->save();

        return redirect ('managegenre');
    }

    public function delete($id)
    {
        $genre = Genre::find($id);

        $genre->delete();

        return redirect('managegenre');
    }
}
