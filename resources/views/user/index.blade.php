@extends('layouts.app')

@section('content')
    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-12">
                <h2>Manage Users</h2>
            </div>
            <div class="col-sm-12">
                <a href="{{url('/newuser')}}"><h4>Add New User</h4></a>
            </div>
            <table class="table">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date of Birth</th>
                    <th>Picture</th>
                    <th>Action</th>
                </tr>
                {{--*/ $i = 1;  /*--}}

                @foreach($users as $u)
                    <tr>
                        <td>{{--*/ echo $i++;  /*--}}</td>
                        <td>{{$u->name}}</td>
                        <td>{{$u->email}}</td>
                        <td>{{$u->dob}}</td>
                        <td>{{$u->pp}}</td>
                        <td>
                            <a class="btn btn-danger" href="{{url('/deleteUser/'.$u->id)}}">Delete</a>
                            <a class="btn btn-primary" href="{{url('/editUser/'.$u->id)}}">Update</a>
                        </td>
                    </tr>

                @endforeach

            </table>
        </div>
    </div>
@endsection