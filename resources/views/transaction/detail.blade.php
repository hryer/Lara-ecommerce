@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Transaction Detail</div>
                    <div class="panel-body">
                        <table class="table text-capitalize">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                            </thead>
                            @foreach($transaction->games as $game)
                                <tr>
                                    <td>{{ $game->name }}</td>
                                    <td>{{ $game->price }}</td>
                                    <td>{{ $game->pivot->quantity }}</td>
                                </tr>
                            @endforeach
                        </table>

                        <div class="lead text-center">
                            Total Quantity : {{ $transaction->games->sum('pivot.quantity') }}
                        </div>
                        <div class="lead text-center">
                            Total Price : {{ $transaction->games->sum(function($t){
                                            return $t->pivot->quantity * $t->price; 
                                        }) }}
                        </div>
                        <div class="text-center">
                            <a class="btn btn-primary" href="{{ url()->previous() }}">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
