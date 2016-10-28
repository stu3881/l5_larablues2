@extends('layouts.main')

@section('content')
	<div id="admin">
	
		<h1>Editing {{ Input::get('id') }} </h1><hr>
		
		<p>Here you can update</p>
		<h2>This is Categories/edit.blade </h2><hr>
	
		@if($errors->has())	
		<div id="form-errors">
			<p>The following errors have occurred:</p>
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error}}</li>
				@endforeach
			</ul>
		</div> <!-- end form-errors -->
		@endif
		
		{{ Form::open(array('url'=>'admin/categories/update', 'method'=>'PUT','class'=>'form-inline')) }}
		@if ($category)
			{{ Form::hidden('id',$category->id) }}
		@endif
		<p>		
		{{ Form::label('Name') }}
		{{ Form::text('name',$category->name) }}</br>
		</p>
		{{ Form::submit('Update Category') }}
		{{ Form::close() }}
		
		{{ Form::open(array('url'=>'admin/main', 'method'=>'GET','class'=>'form-inline')) }}
		{{ Form::submit('Main menu', array('class'=>'cart-btn')) }}
		{{ Form::close() }}
	
	</div> <!-- end admin -->
	
	
@stop
