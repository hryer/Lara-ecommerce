@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update User</div>
                    <div class="panel-body">
                        <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="{{ url('/updateUser') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">E-Mail Address</label>
                                <div class="row"></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="name@example.com" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password">Password</label>
                                <div class="row"></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <input id="password" type="password"  class="form-control" name="password" placeholder="Password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">Password Confirmation</label>
                                <div class="row"></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Password" required>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name">Fullname</label>
                                <div class="row"></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Name" required autofocus>

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
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <input id="dob" type="date" class="form-control" name="dob" placeholder="01/01/1997" value="{{$user->name}}" required autofocus>

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
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <input id="pp" type="file" class="form-control" name="pp" value="{{$user->pp}}" required autofocus>

                                    @if ($errors->has('pp'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('pp') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-2">
                                    <label for="role">Role</label>
                                    <input type="text" name="role" value="member">
                                    <button type="submit" class="btn btn-primary">
                                        Sign Up
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection