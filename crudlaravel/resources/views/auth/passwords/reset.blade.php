@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1> <i class="fa fa-lock"></i> Cambiar Contraseña </h1>
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
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="Correo Electrónico" required autofocus>
                    </div>

                    <div class="form-group">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Nueva Contraseña" required>
                    </div>

                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Cambiar contraseña
                        </button>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection
