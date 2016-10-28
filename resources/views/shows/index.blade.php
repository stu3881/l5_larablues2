@extends('layouts.main')
@section('promo')
	<section id="promo">     
		<div id="promo-details"> 
			{{ HTML::image('img/sbbsnavlogo.gif', 'SBBS logo')}} 
		</div> <!-- end promo-details -->
	</section><!-- promo -->
@stop
@section('content')
	<div id="admin">
	 <?php  //exit('*exit 5 index ');?> 	
		<h1>Shows Admin Panel</h1><hr>
		
		@if ($shows) 
			<p>Here you can edit or delete the new Show</p>
			<ul>
			@foreach($shows as $show)
			<li>
				{{ $show->artist }} -
				{{ $show->title }} -
				{{ $show->date }} -
				{{ Form::open(array('url'=>'admin/shows/destroy', 'class'=>'form-inline')) }}
				{{ Form::hidden('id',$show->id) }}
				{{ Form::submit('delete') }}
				{{ Form::close() }}
				{{ Form::open(array('url'=>'admin/shows/edit','method'=>'get', 'class'=>'form-inline')) }}
				{{ Form::hidden('id',$show->id) }}
				{{ Form::submit('edit') }}
				{{ Form::close() }}
				{{ Form::open(array('url'=>'admin/shows/edittaskassignments','method'=>'get', 'class'=>'form-inline')) }}
				{{ Form::hidden('id',$show->id) }}
				{{ Form::hidden('show_volunteer_link',$show->show_volunteer_link) }}
				{{ Form::submit('maintain_volunteers') }}
				{{ Form::close() }}

<?php  // echo '<br>id='.$show->id; var_dump($show); //exit('*exit 20 ');?>
				@endforeach
			</li>
			</ul>
		@else
		<p>Add a new Show</p>
		<h2>Shows</h2><hr>
		<?php 
			$maillist_index = "";
			$tasks_index = "";
			$record_type = "";
			$date = "";
			$show_run_mode = "";
			$demo_mode_last_refreshed_date ="";
			$length ="";
			$title ="";
			$artist ="";
			$venue_index = "";
			
			$first_shift_start ="6:30";
			$second_shift_start ="8:30";
			$third_shift_start ="10:00";
			$chair_setup_start ="2:30";
			$chair_setup_end ="4:00";
			
			return View::make('shows/add')
			->with('title' , $title)
			->with('maillist_index' , $maillist_index)
			->with('tasks_index' , $tasks_index)
			->with('record_type' , $record_type)
			->with('date' , $date)
			->with('show_run_mode' , $show_run_mode)
			->with('demo_mode_last_refreshed_date' , $demo_mode_last_refreshed_date)
			->with('length' , $length)
			->with('title' , $title)
			->with('artist' , $artist)
			->with('first_shift_start' , $first_shift_start)
			->with('second_shift_start' , $second_shift_start)
			->with('third_shift_start' , $third_shift_start)
			->with('chair_setup_start' , $chair_setup_start)
			->with('chair_setup_end' , $chair_setup_end)
			->with('venue_index' , $venue_index);
			?>
		<!-- {{ Form::open(array('url'=>'admin/shows/add','method'=>'GET',)) }}
		{{ Form::submit('Create Show', array('class'=>'tertiary-btn')) }}
		{{ Form::close() }}
		-->
		@endif
		{{ Form::open(array('url'=>'admin/main','method'=>'GET',)) }}
		{{ Form::submit('Main menu', array('class'=>'tertiary-btn')) }}
		{{ Form::close() }}
		
	

	</div> <!-- end admin -->
	
	
@stop
