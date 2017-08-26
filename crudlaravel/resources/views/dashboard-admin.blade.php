@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1> Bienvenido: {{ Auth::user()->role }}</h1>
            <hr>
            <a href="{{ url('user') }}" class="btn btn-primary btn-lg"> Módulo Usuarios </a>
        </div>
    </div>
</div>
@endsection
