@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div id="background-profile">

        <div class="row">
            <div class="col"></div>
            <div class="col">
                <div id="pp-profile">
                    <img src="{{ $user->pp }}" alt="">
                </div>
            </div>
            <br>
            <div class="col"style="color:white; font-size: 36px;">
                <center>
                    {{$user->name}}
                </center>
            </div>
        </div>


    </div>

    <div id="profile-form">
    <div class="container">

        <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="{{ url('/editprofile') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">Fullname</label>
                <div class="row"></div>
                <div class="col-md-4"></div>
                <div class="col-md-5">
                    <input id="name" type="text" class="form-control" name="name" value="{{ $user->name  }}" placeholder="Name" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                <label for="dob">Date Of Birth</label>
                <div class="row"></div>
                <div class="col-md-4"></div>
                <div class="col-md-5">
                    <input id="dob" type="date" class="form-control" name="dob" value="{{$user->dob}}" required autofocus>

                    @if ($errors->has('dob'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                <label for="pp">Profile Picture</label>
                <div class="row"></div>
                <div class="col-md-4"></div>
                <div class="col-md-5">
                    <input id="pp" type="file" class="form-control" name="pp" required autofocus>

                    @if ($errors->has('pp'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('pp') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-4 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Edit Profile
                    </button>
                </div>
            </div>
        </form>
    </div>
    </div>
</div>

@endsection