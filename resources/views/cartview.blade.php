@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Your Cart</div>
                    <div class="panel-body">
                        <table class="table text-capitalize">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Sub-Total</th>
                                <th></th>
                            </tr>
                            </thead>

                            {{--*/ $totalQty = 0; $totalPrice = 0; /*--}}
                            @for($i = 0 ; $i < count($cart) ; $i++)
                                <tr>
                                    <td><img src="{{ asset($cart[$i]['game']->picture) }}" width="100px"></td>
                                    <td>{{ $cart[$i]['game']->name }}</td>
                                    <td>{{ $cart[$i]['quantity'] }}</td>
                                    <td>{{ $cart[$i]['game']->price }}</td>
                                    <td>{{ $cart[$i]['game']->price * $cart[$i]['quantity'] }}</td>
                                    <td>
                                        <form action="{{ url('/cart/'.$cart[$i]['game']->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>

                                    {{--*/
                                        $totalQty += $cart[$i]['quantity'];
                                        $totalPrice = $cart[$i]['game']->price * $cart[$i]['quantity']
                                    /*--}}
                                </tr>
                            @endfor
                        </table>

                        <div class="lead text-center">
                            Total Quantity : {{ $totalQty }}
                        </div>
                        <div class="lead text-center">
                            Total Price : {{ $totalPrice }}
                        </div>
                        <div class="text-center">
                            <form action="{{ url('/transaction') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                <button class="btn btn-lg btn-primary">Check Out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
