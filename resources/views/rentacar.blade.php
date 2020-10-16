@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"> 
                            
                <h3 class="text-center">Dear <strong>{{$user}}</strong>, thank you for choosing our <strong>{{$cars->brand}} {{$cars->model}}</strong></h3>
                <h4 class="text-center">Enjoy your trip</h4>
            </div>
            <div class="panel-body text-center">
                <a href="/rentacar/public/home" class="btn btn-info">Home</a>
            </div>
        </div>
    </div>    
@endsection
