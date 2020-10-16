@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-7 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Add Location</strong> <a href="/rentacar/public/home" class="pull-right btn btn-default btn-xs">Go Back</a></div>

            {{-- laravelcollective --}}
            <div class="panel-body">
              {!!Form::open(['action' => 'LocationsController@store','method' => 'POST'])!!}
                {{Form::bsText('city','',['placeholder' => 'City'])}}
                {{Form::bsText('email','',['placeholder' => 'Contact Email'])}}
                {{Form::bsText('address','',['placeholder' => 'Company Address'])}}
                {{Form::bsText('phone','',['placeholder' => 'Contact Phone'])}}
                {{Form::bsSubmit('submit')}}
              {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection