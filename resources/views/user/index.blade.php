@extends('layouts.template')
@section('content')

<div class=" uk-width-1-2@s uk-padding-small uk-background-secondary uk-width-medium uk-overflow-auto">
	<!-- TABLA DE DATOS -->

	<div class="uk-width-1-1" >
		<h3 class="uk-align-left">Usuarios Sidca:</h3>
		<div class="uk-align-right uk-flex uk-flex-stretch">
			<form class="uk-search uk-search-default">
				<span uk-search-icon></span>
				<input class="uk-search-input" type="search" placeholder="Search...">
			</form>
		</div>
	</div>
	<table class="uk-table uk-table-small uk-table-striped uk-table-small uk-table-divider">
		<thead>
			<tr>
				<th>usuario</th>
				<th>nombres</th>
				<th>apellidos</th>
				<th>accion</th>
			</tr>
		</thead>
		<tbody>
			@foreach($usuarios as $usuario)
			<tr>
				<td>{{ $usuario->user }}</td>
				<td>{{ $usuario->first_name }}</td>
				<td>{{ $usuario->last_name }}</td>
				<td>
					<a href="#" uk-icon="file-edit"></a>
					<a href="#" uk-icon="trash"></a>
					<a href="#" uk-icon="info"></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection