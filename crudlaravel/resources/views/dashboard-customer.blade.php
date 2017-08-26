@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1> Bienvenido: {{ Auth::user()->role }}</h1>
            <hr>
            <p>
            	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum atque debitis aliquam, totam harum nesciunt quis itaque, neque assumenda sunt. Quia, veritatis, rerum? Consequatur voluptate totam minus eum laborum magni.
            </p>
        </div>
    </div>
</div>
@endsection
