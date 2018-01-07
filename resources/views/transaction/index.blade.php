@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-capitalize">{{ $action }} Transaction</div>
                    <div class="panel-body">
                        <table class="table text-capitalize">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Date</th>

                            </tr>
                            </thead>
                            @foreach($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->id }}</td>
                                    <td>{{ $transaction->user->email }}</td>
                                    <td>{{ $transaction->created_at }}</td>

                                        <td>

                                            <a class="btn btn-danger" href="{{ url('transaction/delete/'.$transaction->id) }}">Delete</a>
                                        </td>

                                        <td>
                                            <a class="btn btn-primary" href="{{ url('transaction/detail/'.$transaction->id) }}">Detail</a>
                                        </td>

                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
