@extends('layouts.app')

@section('content')
    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-12">
                <h2>Manage Genre</h2>
            </div>
            <div class="col-sm-12">
                <a  class="btn btn-success" href="{{url('/newgenre')}}"><h4>Add New Genre</h4></a>
            </div>
            <table class="table">
                <tr>
                    <th>#</th>
                    <th>Genre Name</th>
                    <th>Action</th>
                </tr>
                <?php $i = 1;?>
                @foreach($genres as $g)
                    <tr>
                        <td><?php echo $i++;?> </td>
                        <td>{{$g->name}}</td>
                        <td>
                            <a class="btn btn-danger" href="{{url('/delete/'.$g->id)}}">Delete</a>
                            <a  class="btn btn-primary" href="{{url('/updategenreview/'.$g->id)}}">Update</a>
                        </td>
                    </tr>

                @endforeach

            </table>
        </div>
    </div>
@endsection