@extends('layouts.app')
@section('title', 'Lista Desplegable (Dependientes)')
@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Lista Desplegable (Dependientes)</h1>
			<hr>
			<form action="" method="post">
				<div class="form-group">
					{{ csrf_field() }}
					<select name="departments" id="departments" class="form-control">
						<option value="">Seleccione Departamento...</option>
						@foreach($deps as $dep)
							<option value="{{ $dep->id_dep }}">{{ $dep->name_dep }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<img src="{{ asset('imgs/loading.gif') }}" id="loading">
					<select name="municipalities" id="municipalities" class="form-control" readonly>
						<option value="">Seleccione Municipio...</option>
					</select>
				</div>
			</form>
		</div>
	</div>
@endsection