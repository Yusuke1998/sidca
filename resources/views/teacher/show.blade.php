@extends('layouts.template')
@section('content')
<div class=" uk-width-1-2@s uk-padding-small uk-background-secondary">
	<div class="uk-text-center k-text-center@m k-text-center@s">
		<h2 class="uk-text-capitalize">{{ $teacher->first_name }} {{ $teacher->last_name }}</h2>
	</div>
	<div class="uk-text-right">
		
	</div>
</div>
@endsection