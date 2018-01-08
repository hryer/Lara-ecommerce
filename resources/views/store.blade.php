@extends('layouts.app')

@section('content')
    <div id="store">
    <div class="container-fluid" >

        <div class="row">
            <div class="col-md-12">
                <h2>Browse</h2>
                <hr>
            </div>
            <div class="col-md-3">
                <h3>FILTER</h3>
                <hr width="60%" align="left">
                <form action="{{url('/store')}}" method="GET" role="form">
                <h4>GENRE</h4>
                <ul style="list-style-type: none">
                    @foreach($genres as $genre)
                    <li><a href="#" style="">{{$genre->name}}</a></li>
                        <select class="hidden form-control" name="by">
                            <option value="genre">Name</option>
                        </select>

                        @endforeach
                </ul>
                <h4>NAME</h4>
                <input id="search" name="search" type="text" style="width: 60%;align:left" placeholder="Type here..."><br>

                    @if ($errors->has('search'))
                        <span class="help-block">
                            <strong>{{ $errors->first('search') }}</strong>
                        </span>
                    @endif

                    <select class="hidden form-control" name="by">
                        <option value="name">Name</option>
                    </select>

                <button class="btn" style="margin-top: 5px" type="submit" >Search</button>



                </form>
            </div>


            <div class="row col-md-offset-3">
                @foreach($games as $g)
                    <div class="col-md-4">
                        <div id="product">
                            <div id="gambar">
                                @if(Auth::guest() or Auth::user()->role=='admin')
                                <img src="{{$g->picture}}" alt="">
                                <br>
                                <span>{{$g->name}}</span>
                                <br>
                                <span id="harga">Rp. {{$g->price}}</span>
                                @elseif (Auth::user()->role=='member')
                                    <img src="{{$g->picture}}" alt="">
                                    <br>
                                    <span>{{$g->name}}</span>
                                    <br>
                                    <span id="harga">Rp. {{$g->price}}</span>
                                <a href="{{ url('detail/'.$g->id) }}">
                                    <span class="glyphicon glyphicon-shopping-cart"></span>
                                </a>
                                    @endif

                            </div>
                        </div>
                    </div>
                @endforeach

                <ul class="pagination pagination-sm">
                    {{ $games->appends(['action'=> app('request')->input('action'), 'search' => app('request')->input('search'),
                    'by' => app('request')->input('by')])->links() }}
                </ul>
            </div>

        </div>
    </div>
    </div>
@endsection