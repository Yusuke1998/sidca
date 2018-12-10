@extends('layouts.template')
@section('content')
<!-- REPORT -->
@include('layouts.alert')
<div class=" uk-width-1-2@s uk-padding-small uk-background-secondary uk-width-medium uk-overflow-auto">
	<!-- TABLA DE DATOS -->

	<div class="uk-width-1-1" >
		<h3 class="uk-align-left">Reporte Sidca:</h3>
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
				<th>Nro</th>
				<th>Cedula</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Nucleo/Sede</th>
				<th>Estatus</th>
				<th>Accion</th>

			</tr>
		</thead>
		<tbody>
			@forelse($teachers as $teacher)
			
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{ $teacher->identity }}</td>
				<td>{{ $teacher->first_name }}</td>
				<td>{{ $teacher->last_name }}</td>
				<td>{{ $teacher->headquarter->headquarter }}</td>
				<td>{{ $teacher->status }}</td>

				<td>
					<a href="#" uk-icon="file-edit" class="edit"></a> ><!-- {{ route('profesores.edit', $teacher->id) }}-->
					<a href="{{ route('profesores.show', $teacher->id) }}" uk-icon="info"></a>
					<form name="destroy{{$teacher->id}}" action="{{ route('profesores.destroy', $teacher->id) }}" method="post">
						{{csrf_field()}}
						{{method_field('DELETE')}}
						<span class="uk-icon" uk-icon="trash" onclick="destroy{{$teacher->id}}.submit()"></span>
					</form>
				</td>

			</tr>
			@empty

			<h3>No existen datos.</h3>

			@endforelse
		</tbody>

	</table>
</div>

<!-- /REPORT -->
@endsection