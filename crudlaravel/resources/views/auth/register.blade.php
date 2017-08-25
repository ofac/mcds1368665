@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
                <h1> <i class="fa fa-user"></i> Registro </h1>
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
                <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombre Completo" autofocus>
                    </div>

                    <div class="form-group">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Correo Electrónico">
                    </div>

                    <div class="form-group">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña">
                    </div>

                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-lg btn-success">
                            Registrar
                        </button>
                    </div>
                </form>

        </div>
    </div>
</div>
@endsection
