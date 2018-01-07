
@extends('layouts.app')

@section('content')
    <div id="store">
        <div class="container-fluid" >

            <div class="row">
              



                <div class="row col-md-offset-3">
                    @foreach($transactions as $transaction)

                        @foreach($transaction->games as $g)
                        <div class="col-md-4">
                            <div id="product">
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
                        </div>
                        @endforeach


                    @endforeach




                </div>

            </div>
        </div>
    </div>
@endsection