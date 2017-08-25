@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1> <i class="fa fa-lock"></i> Inicio Sesión </h1>
            <hr>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach($errors->all() as $error)
                        <li> {{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Correo Electrónico" required autofocus>
                </div>

                <div class="form-group">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required>
                </div>

                <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Ingresar
                        </button>
                        <hr>
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Olvido su contraseña?
                        </a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
