@extends('layouts.main')

@section('content')
	<div id="admin">
	
	
		<h1>Xxxs Admin Panel</h1><hr>
		
		<p>Here you can view, delete and create new Xxxs</p>
		<h2>Xxxs</h2><hr>
		{{ Form::open(array('url'=>'admin/xxxs/add','method'=>'GET',)) }}
		{{ Form::submit('Create Xxx', array('class'=>'tertiary-btn')) }}
		{{ Form::close() }}
		{{ Form::open(array('url'=>'admin/main','method'=>'GET',)) }}
		{{ Form::submit('Main menu', array('class'=>'tertiary-btn')) }}
		{{ Form::close() }}
		
		<ul>
			@foreach($categories as $category)
			<li>
				{{ $category->name }} -
				{{ Form::open(array('url'=>'admin/xxxs/destroy', 'class'=>'form-inline')) }}
				{{ Form::hidden('id',$category->id) }}
				{{ Form::submit('delete') }}
				{{ Form::close() }}
				{{ Form::open(array('url'=>'admin/xxxs/edit','method'=>'get', 'class'=>'form-inline')) }}
				{{ Form::hidden('id',$category->id) }}
				{{ Form::submit('edit') }}
				{{ Form::close() }}
				<?php  // echo '<br>id='.$category->id; var_dump($category); //exit('*exit 20 ');?>
				@endforeach
			</li>
		</ul>
	
	

	</div> <!-- end admin -->
	
	
@stop
