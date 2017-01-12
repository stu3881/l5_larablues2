@extends('layouts.main')

@section('content')
	<div id="admin">
	
		{{ Form::open(array('url'=>'admin/categories/create','method'=>'POST')) }}
		<p>		
			{{ Form::label('name') }}
			{{ Form::text('name') }}
		</p>
		{{ Form::submit('Add Category', array('class'=>'secondary-cart-btn')) }}
		{{ Form::close() }}
	

	</div> <!-- end admin -->
	
	
@stop