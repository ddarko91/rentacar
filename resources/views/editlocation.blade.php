@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-7 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Location<a href="/rentacar/public/home" class="pull-right btn btn-default btn-xs">Go Back</a></div>

            {{-- laravelcollective --}}            
            <div class="panel-body">
              {!!Form::open(['action' => ['LocationsController@update', $location->id],'method' => 'POST'])!!}
                {{Form::bsText('city',$location->city,['placeholder' => 'City'])}}
                {{Form::bsText('email',$location->email,['placeholder' => 'Contact Email'])}}
                {{Form::bsText('address',$location->address,['placeholder' => 'Company Address'])}}
                {{Form::bsText('phone',$location->phone,['placeholder' => 'Contact Phone'])}}
                {{Form::hidden('_method', 'PUT')}}
                {{Form::bsSubmit('submit')}}
              {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection