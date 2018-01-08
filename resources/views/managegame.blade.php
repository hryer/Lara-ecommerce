@extends('layouts.app')

@section('content')
    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-12">
                <h2>Manage Games</h2>
            </div>
            <div class="col-sm-12">
                <a class="btn btn-success" href="{{url('/newgame')}}"><h4>Add New Game</h4></a>
            </div>
            <table class="table">
                <tr>
                    <th>#</th>
                    <th>Game Name</th>
                    <th>Genre</th>
                    <th>Price</th>
                    <th>Release Date</th>
                    <th>Picture</th>
                    <th>Action</th>
                </tr>
                <?php $i = 1;?>
                @foreach($games as $g)
                    <tr>
                        <td><?php echo $i++;?> </td>
                        <td>{{$g->name}}</td>
                        <td>{{$g->genre->name}}</td>
                        <td>{{$g->price}}</td>
                        <td>{{$g->rdate}}</td>
                        <td>{{$g->picture}}</td>
                        <td>
                            <a class="btn btn-danger" href="{{url('/deletegame/'.$g->id)}}">Delete</a>
                            <a class="btn btn-primary" href="{{url('/updategameview/'.$g->id)}}">Update</a>
                        </td>
                    </tr>

                @endforeach

            </table>
        </div>
    </div>
@endsection