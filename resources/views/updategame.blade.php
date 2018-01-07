@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update Game</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/updategame/'.$game->id) }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name">Game Name</label>
                                <div class="row"></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control" name="name" value="{{$game->name}}" autofocus required>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <label for="price">Price</label>
                                <div class="row"></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <input id="price" type="text" class="form-control" name="price" value="{{$game->price}}" required>

                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('rdate') ? ' has-error' : '' }}">
                                <label for="dob">Release Date</label>
                                <div class="row"></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <input id="rdate" type="date" class="form-control" name="rdate" value="{{$game->rdate}}" required >

                                    @if ($errors->has('rdate'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('rdate') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('genre') ? ' has-error' : '' }}">
                                <label for="genre">Genre</label>
                                <div class="row"></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <select name="genre" id="genre" required>
                                        @foreach($genres as $genre)
                                            <option value="{{$genre->id}}">{{$genre->name}}</option>

                                        @endforeach
                                    </select>

                                    @if ($errors->has('genre'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('genre') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('rdate') ? ' has-error' : '' }}">
                                <label for="picture">Picture</label>
                                <div class="row"></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <input id="picture" type="file" class="form-control" name="picture" required>

                                    @if ($errors->has('picture'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('picture') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary">
                                        Update
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