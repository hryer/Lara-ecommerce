@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-capitalize">{{ $game->name }}</div>
                    <div class="panel-body text-capitalize">
                        <div class="text-center">
                            <img src="{{asset($game->picture)}}" width="40%">
                        </div>
                        <dl class="dl-horizontal" style="padding-left: 26%;">
                            <dt>Price</dt>
                            <dd>{{ $game->price }}</dd>
                            <dt>Genre</dt>
                            <dd>{{ $game->genre->name }}</dd>

                        </dl>
                        {{--buat rate--}}
                        <br>


                        <div style="margin-top: 20px;">
                            <form class="form-horizontal" method="POST" action="{{ url('/cart') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="game_id" value="{{ $game->id }}">
                                <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                                    <label for="quantity" class="col-md-2 control-label" style="padding-left: 61px;">Quantity</label>

                                    <div class="col-md-2">
                                        <input id="quantity" type="number" class="form-control" name="quantity">
                                    </div>
                                    <button class="btn btn-primary col-md-7">Add to Cart</button>
                                    @if ($errors->has('quantity'))
                                        <span class="help-block col-md-12 text-center">
                                    <strong>{{ $errors->first('quantity') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </form>
                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection
