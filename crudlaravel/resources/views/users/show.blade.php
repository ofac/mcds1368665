@extends('layouts.app')

@section('title', 'Consultar Usuario')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<br>
			<ol class="breadcrumb">
				<li><a href="{{ url('/') }}">Lista de Usuarios</a></li>
				<li class="active"> Consultar Usuario </li>
			</ol>
			<h1 class="lead"> <i class="fa fa-search"></i> Consultar Usuario </h1>

			<table class="table table-striped table-hover">
				<tr>
					<th>ID:</th>
					<td>{{ $usr->id }}</td>
				</tr>
				<tr>
					<th>NOMBRE:</th>
					<td>{{ $usr->name }}</td>
				</tr>
				<tr>
					<th>CORREO ELECTRÓNICO:</th>
					<td>{{ $usr->email }}</td>
				</tr>
				<tr>
					<th>ROL:</th>
					<td>{{ $usr->role }}</td>
				</tr>
				<tr>
					<th>FOTO:</th>
					<td><img src="{{ asset($usr->photo) }}" width="160px"></td>
				</tr>
				<tr>
					<th>FECHA CREACIÓN:</th>
					<td>{{ $usr->created_at }}</td>
				</tr>
				<tr>
					<th>FECHA ACTUALIZACIÓN:</th>
					<td>{{ $usr->updated_at }}</td>
				</tr>
			</table>
	
		</div>
	</div>
@endsection