<option value="">Seleccione Municipio...</option>
@foreach($muns as $mun)
	<option value="{{ $mun->id_mun }}">{{ $mun->name_mun }}</option>
@endforeach