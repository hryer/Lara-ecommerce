<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Validator;

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
        $user->roles()->attach(Role::where('name','member')->first());
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
        $rules = [
            'name' => 'required|min:5|max:255',
            'dob' => 'required|before:-12 years',
            'pp' => 'required|image',
        ];

        //validasi
        $validation = Validator::make($r->all(), $rules);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation);
        }
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

    public function delete($id){

        $user = User::find($id);
        $user->delete();

        return back();
    }

    public function viewUpdate($id)
    {
        $user = User::find($id);

        return view('user.update')->with(
            ['user' => $user]
        );
    }

    public function update(Request $r){

        $user = User::find($r->id_update);

        $user->email = $r->email;
        $user->name = $r->name;
        $user->dob = $r->dob;
        $user->password = bcrypt($r->password);
        $user->role = $r->role;
        $image = Input::file('pp');
        $file_name = $image->getClientOriginalName();
        $upload = Input::file('pp')->move('users', $file_name);
        $user->pp = 'users/'.$file_name;
        $user->save();


        return redirect ('manageuser');

    }

    public function changeRole(Request $r){
        $user = User::where('email',$r['email'])->first();
        $user->roles()->detach();
        if($r['role_admin']){
            $user->roles()->attach(Role::where('name','admin')->first());
        }
        if($r['role_member']){
            $user->roles()->attach(Role::where('name','member')->first());
        }

        return redirect()->back();
    }

}
