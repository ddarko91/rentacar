@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>{{$location->city}}</strong> <a href="/rentacar/public/home" class="pull-right btn btn-default btn-xs">Go Back</a></div>

            <div class="panel-body">
              <ul class="list-group">
                <li class="list-group-item"><strong>Email:</strong> {{$location->email}}</li>
                <li class="list-group-item"><strong>Address:</strong> {{$location->address}}</li>
                <li class="list-group-item"><strong>Phone:</strong> {{$location->phone}}</li>
              </ul>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Cars Available in {{$location->city}}</strong></div>
            <div class="panel-body">
                @if(count($cars))
                    <table class="table table-striped">
                        <tr>
                          <th>Brand</th>
                          <th>Model</th>
                          <th>Year</th>
                          <th>Fuel</th>
                          <th>Price per day</th>
                          <th></th>
                          <th></th>
                          <th></th>
                        </tr>
                        @foreach($cars as $car)
                            @if ($location->id == $car->locations_id)
                            <tr>
                                <td>{{$car->brand}}</td>
                                <td>{{$car->model}}</td>
                                <td>{{$car->year}}</td>
                                <td>{{$car->fuel}}</td>
                                <td>{{$car->price}} EUR</td>
                                <td><a href="/rentacar/public/cars/{{$car->id}}" class="btn btn-info btn-xs">Rent</a></td>
                                <td><a href="/rentacar/public/cars/{{$car->id}}/edit" class="btn btn-warning btn-xs pull-right">Edit</a></td>
                                <td>{{-- laravelcollective --}}
                                    {!!Form::open(['action' => ['CarsController@destroy', $car->id],'method' => 'POST', 'class' => 'pull-left', 'onsubmit' => 'return confirm("Are you sure?")'])!!}
                                      {{Form::hidden('_method', 'DELETE')}}
                                      {{Form::bsSubmit('Delete', ['class' => 'btn btn-danger btn-xs'])}}
                                    {!! Form::close() !!}</td>
                            </tr>
                            @endif    
                        @endforeach
                    </table>
                @else
                    <p class="text-center">No cars available in this city</p>  
                @endif 
            </div>
        </div>    
    </div>
</div>
                       
@endsection
