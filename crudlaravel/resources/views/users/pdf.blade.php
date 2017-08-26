
<table>
	<tr>
		<th> Nombre </th>
		<th> Correo Electrónico </th>
		<th> Rol </th>
	</tr>
@foreach($users as $user)
	<tr>
		<td>{{ $user->name }}</td>
		<td>{{ $user->email }}</td>
		<td>{{ $user->role }}</td>
	</tr>
@endforeach
</table>