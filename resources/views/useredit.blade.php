@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-7 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Your Profile<a href="/rentacar/public/home" class="pull-right btn btn-default btn-xs">Home</a></div>

            {{-- laravelcollective --}}            
            <div class="panel-body">
              {!!Form::open(['action' => ['UserController@update', $user->id],'method' => 'POST'])!!}
                {{Form::bsText('firstname',$user->firstname,['placeholder' => 'First Name'])}}
                {{Form::bsText('lastname',$user->lastname,['placeholder' => 'Last Name'])}}
                {{Form::bsText('email',$user->email,['placeholder' => 'Email'])}}
                {{Form::bsText('date',$user->date,['placeholder' => 'Date'])}}
                {{Form::bsText('phone',$user->phone,['placeholder' => 'Contact Phone'])}}
                {{Form::hidden('_method', 'PUT')}}
                {{Form::bsSubmit('submit')}}
              {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection