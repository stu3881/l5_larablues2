@extends('layouts.main')

@section('content')
	<div id="admin">
		
		
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
	
		
		
		{{ Form::open(array('url'=>'admin/xxxs/update', 'method'=>'PUT','class'=>'form-inline')) }}
		{{ Form::hidden('id',Input::get('id')) }}
		<p>		
		{{ Form::label('Name') }}
		{{ Form::text('name',$name) }}</br>
		{{-- Form::text('name',Input::get('name')) --}}</br>
		</p>
		ehy
		{{ Form::submit('Update category') }}
		{{ Form::close() }}
		
		{{ Form::open(array('url'=>'admin/main', 'method'=>'GET','class'=>'form-inline')) }}
		{{ Form::submit('Main menu', array('class'=>'cart-btn')) }}
		{{ Form::close() }}
	
	</div> <!-- end admin -->
	
	
@stop
