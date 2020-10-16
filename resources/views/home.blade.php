@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3><span class="hometitle"> Choose the nearest location to you </span>
                      <span class="pull-right">
                        <a href="/rentacar/public/cars/create" class="btn btn-success btn-xs " <?php if (count($locations) < 1){ ?> disabled <?php   } ?>>Add Car</a>
                      </span>
                      <span class="pull-right">
                        <a href="/rentacar/public/locations/create" class="btn btn-success btn-xs ">Add Location</a>
                      </span>
                    </h3>
                </div>
                

                <div class="panel-body">
                    <!---->
                    @if(count($locations))
                      <table class="table table-striped ">
                        <tr>
                          <th class="text-center">Location available</th>
                          <th></th>
                          <th></th>
                        </tr>
                        @foreach($locations as $location)
                          <tr>
                            <td class="locationlist text-center"><a href="/rentacar/public/locations/{{$location->id}}">{{$location->city}}</a></td>
                            <td><a href="/rentacar/public/locations/{{$location->id}}/edit" class="btn btn-warning btn-xs pull-right">Edit</a></td>
                            <td>
                              {{-- laravelcollective --}}
                              {!!Form::open(['action' => ['LocationsController@destroy', $location->id],'method' => 'POST', 'class' => 'pull-left', 'onsubmit' => 'return confirm("Are you sure?")'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::bsSubmit('Delete', ['class' => 'btn btn-danger btn-xs'])}}
                              {!! Form::close() !!}
                            </td>
                          </tr>
                        @endforeach
                      </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
