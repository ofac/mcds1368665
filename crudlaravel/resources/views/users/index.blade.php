@extends('layouts.app')

@section('title', 'Lista de Usuarios')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1 class="lead"> Lista de Usuarios </h1>
			<hr>
			<a class="btn btn-success" href="{{ url('user/create') }}"> Adicionar Usuario</a>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Correo Electrónico</th>
						<th>Rol</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
				@foreach($users as $user)
					<tr>
						<td> {{ $user->name }}</td>
						<td> {{ $user->email }}</td>
						<td> {{ $user->role }}</td>
						<td>
							<a class="btn btn-info" href="{{ url('user/'.$user->id) }}"> C </a>
							<a class="btn btn-info" href="{{ url('user/'.$user->id.'/edit') }}"> M </a>
							<a class="btn btn-danger" href=""> E </a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection