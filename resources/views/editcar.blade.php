@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-7 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Car<a href="/rentacar/public/locations/{{$cars->locations_id}}" class="pull-right btn btn-default btn-xs">Go Back</a></div>
            
            {{-- laravelcollective --}}            
            <div class="panel-body">
              {!!Form::open(['action' => ['CarsController@update', $cars->id],'method' => 'POST'])!!}
                
                {{Form::bsText('brand',$cars->brand,['placeholder' => 'Brand'])}}
                {{Form::bsText('model',$cars->model,['placeholder' => 'Model'])}}
                {{Form::bsText('year',$cars->year,['placeholder' => 'Year'])}}
                {{Form::bsText('fuel',$cars->fuel,['placeholder' => 'Fuel'])}}
                {{Form::bsText('price',$cars->price,['placeholder' => 'Price Per Day'])}}
                
                {{Form::hidden('_method', 'PUT')}}
                {{Form::bsSubmit('submit')}}
              {!! Form::close() !!}
              
            </div>
        </div>
    </div>
</div>
@endsection