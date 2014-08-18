@extends('layouts.master')

@section('container')
<div class="row">
	@if(isset($errorHeading))
	<h1>{{$errorHeading}}</h1>
	@else
	<h1>Error</h1>
	@endif

	@if(isset($errorBody))
	<p>{{$errorBody}}</p>
	@else
	<p>An error has occurred, if this problem persists please contact the website administrator</p>
	@endif
</div>
@stop