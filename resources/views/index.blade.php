@extends('layouts.app')

@section('content')
    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-12">
                <h2>Lowest Price Game</h2>
                <hr>
            </div>
        </div>
    </div>


    <div id="product">
        <div class="container">
            <div class="row">
                <!-- ini tambahin for each maksimal 4-->
                @foreach($lowestPrice as $g)
                <div class="col-md-3">
                    <div id="gambar">
                        <img src="{{$g->picture}}" alt="">
                        <br>
                        <span>{{$g->name}}</span>
                        <br>
                        <span id="harga">Rp. {{$g->price}}</span>
                        <br>
                        <a class="btn btn-primary" href="{{ url('detail/'.$g->id) }}">Display</a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection