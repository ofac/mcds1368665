@extends('layouts.app')

@section('title', 'Modificar Usuario')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<br>
			<ol class="breadcrumb">
				<li><a href="{{ url('/') }}">Lista de Usuarios</a></li>
				<li class="active"> Modificar Usuario </li>
			</ol>

			<h1 class="lead"> <i class="fa fa-pencil"></i> Modificar Usuario </h1>
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
			<form action="{{ url('user/'.$usr->id) }}" method="post" enctype="multipart/form-data">
				<div class="form-group">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<input type="text" name="name" class="form-control" value="{{ $usr->name }}" placeholder="Nombre Completo">
				</div>
				<div class="form-group">
					<input type="email" name="email" class="form-control" value="{{ $usr->email }}" placeholder="Correo Electrónico">
				</div>
				<div class="form-group">
					<select name="role" class="form-control">
						<option value="">Seleccione Rol...</option>
						<option value="Admin" @if($usr->role == 'Admin') selected @endif >Administrador</option>
						<option value="Customer" @if($usr->role == 'Customer') selected @endif >Cliente</option>
					</select>
				</div>
				<div class="form-group" id="appUpload">
					<input type="file" class="hide" name="photo" id="upload" accept="image/*">
					<button type="button" class="btn btn-default btn-block" v-on:click="openBrowser()"> 
						<i class="fa fa-upload"></i> Subir Foto
					</button>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success btn-block"> 
						<i class="fa fa-save"></i> Modificar
					</button>
				</div>

			</form>
		</div>
	</div>
@endsection