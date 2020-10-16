@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-7 col-md-offset-2">
        <div class="panel panel-default">
            
            <div class="panel-heading"><strong>Add Car</strong> <a href="/rentacar/public/home" class="pull-right btn btn-default btn-xs">Go Back</a></div>
            
                {{-- laravelcollective --}}
                <div class="panel-body">
                {!!Form::open(['action' => 'CarsController@store','method' => 'POST'])!!}
                    {{Form::label('locations_id', 'Choose a City') }}
                    {{Form::select('locations_id', $location ,'', ['class'=>'form-control'])}}
                    {{Form::bsText('brand','',['placeholder' => 'Brand'])}}
                    {{Form::bsText('model','',['placeholder' => 'Model'])}}
                    {{Form::bsText('year','',['placeholder' => 'Year'])}}
                    {{Form::bsText('fuel','',['placeholder' => 'Fuel'])}}
                    {{Form::bsText('price','',['placeholder' => 'Price per'])}}
                    {{Form::bsSubmit('submit')}}
                {!! Form::close() !!}
                </div>
        </div>
    </div>
</div>
@endsection