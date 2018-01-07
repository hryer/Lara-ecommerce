<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\User;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('user.index',compact('users'));
    }

    public function newUser(){
        return view('user.new');
    }

    public function insert(Request $data){
        $user = User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'name' => $data['name'],
            'dob' => $data['dob'],
            'pp' => $data['pp'],
            'role' => $data['role'],
        ]);
        $fname = $data['pp']->getClientOriginalName();
        $upload = $data['pp']->move('users', $fname);
        $user->update(['pp' => 'users/'.$fname]);

        return redirect('manageuser');
    }

    public function profile()
    {
        $user = Auth::User();

        return view('profile')->with(
            ['user' => $user]
        );
    }

    public function editProfile(Request $r)
    {
        $user = Auth::User();

        $user->name = $r->name;
        $user->dob = $r->dob;
        $image = Input::file('pp');
        $file_name = $image->getClientOriginalName();
        $upload = Input::file('pp')->move('users', $file_name);
        $user->pp = 'users/'.$file_name;
        $user->save();

        return redirect('/profile');

    }
}
