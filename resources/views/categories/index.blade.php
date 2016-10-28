@extends('layouts.main')

@section('content')
	<div id="admin">
	
	
		<h1>Categories Admin Panel</h1><hr>
		
		<p>Here you can view, delete and create new categories</p>
		<h2>Categories</h2><hr>
		{{ Form::open(array('url'=>'admin/categories/add','method'=>'GET',)) }}
		{{ Form::submit('Create Category', array('class'=>'cart-btn')) }}
		{{ Form::close() }}
		{{ Form::open(array('url'=>'admin/main','method'=>'GET',)) }}
		{{ Form::submit('Main menu', array('class'=>'secondary-cart-btn')) }}
		{{ Form::close() }}
		
		<ul>
			@foreach($categories as $category)
			<li>
				{{ $category->name }} -
				{{ Form::open(array('url'=>'admin/categories/destroy', 'class'=>'form-inline')) }}
				{{ Form::hidden('id',$category->id) }}
				{{ Form::submit('delete') }}
				{{ Form::close() }}
				{{ Form::open(array('url'=>'admin/categories/edit','method'=>'get', 'class'=>'form-inline')) }}
				{{ Form::hidden('id',$category->id) }}
				{{ Form::submit('edit') }}
				{{ Form::close() }}
				<?php  // echo '<br>id='.$category->id; var_dump($category); //exit('*exit 20 ');?>
				@endforeach
			</li>
		</ul>
	
	

	</div> <!-- end admin -->
	
	
@stop
