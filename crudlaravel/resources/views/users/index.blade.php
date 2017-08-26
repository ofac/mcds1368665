@extends('layouts.app')

@section('title', 'Lista de Usuarios')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<br>
		<a href="{{ url('departments') }}" class="btn btn-default"> 
			<i class="fa fa-list"></i> Ejemplo de Lista Desplegable 
		</a>
			<h1 class="lead"> Lista de Usuarios </h1>
			@if(session('status'))
				<div class="alert alert-success">
					<ul>
						<li> {!! session('status') !!} </li>
					</ul>
				</div>
			@endif
			<hr>
			<a class="btn btn-success" href="{{ url('user/create') }}"> 
				<i class="fa fa-plus"></i>
			 	Adicionar Usuario
			</a>
			<a class="btn btn-default" href="{{ url('pdf') }}"> Generar PDF </a>
			<br><br>
			<strong>Número de Usuarios:</strong>
			<span class="badge"> {{ $users->count() }}</span>
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
							<a class="btn btn-info" href="{{ url('user/'.$user->id) }}"> 
								<i class="fa fa-search"></i> 
							</a>
							<a class="btn btn-info" href="{{ url('user/'.$user->id.'/edit') }}"> 
							 	<i class="fa fa-pencil"></i>
							</a>
							<form action="{{ url('user/'.$user->id) }}" method="POST" style="display: inline">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
								<button type="button" class="btn btn-danger btn-delete"> 
									<i class="fa fa-trash"></i> 
								</button>
							</form>
						</td>
					</tr>
				@endforeach
				</tbody>
				<tfoot>
					<tr>
						<td colspan="4" class="text-center">
							{!! $users->render() !!}
						</td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
@endsection