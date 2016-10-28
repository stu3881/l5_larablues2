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
<?php   echo '<br>id=';  exit('*exit 20 ');?>

		<h1>Tasks Admin Panel</h1><hr>
		{{ Form::open(array('url'=>'admin/'.$this->model_table.'/add','method'=>'GET', 'class'=>'form-inline')) }}
		{{-- Form::hidden('id',$task->id) --}}
		{{ Form::submit('Add new task') }}
		{{ Form::close() }}
		{{ Form::open(array('url'=>'admin/main','method'=>'GET', 'class'=>'form-inline')) }}
		{{-- Form::hidden('id',$task->id) --}}
		{{ Form::submit('Main Menu') }}
		{{ Form::close() }}
		
		@if ($tasks) 
			<p>Here you can edit or delete the new task</p>
			<ul>
			@foreach($tasks as $task)
			<li>
				{{ $task->TaskName1 }} -
				{{ $task->TaskType }} -
				{{ $task->PermanentTask }} -
				{{ Form::open(array('url'=>'admin/'.$this->model_table.'/destroy', 'class'=>'form-inline')) }}
				{{ Form::hidden('id',$task->id) }}
				{{ Form::submit('delete') }}
				{{ Form::close() }}
				{{ Form::open(array('url'=>'admin/'.$this->model_table.'/edit','method'=>'get', 'class'=>'form-inline')) }}
				{{ Form::hidden('id',$task->id) }}
				{{ Form::submit('edit') }}
				{{ Form::close() }}
				{{ Form::open(array('url'=>'admin/'.$this->model_table.'/ActivateDeactivate','method'=>'get', 'class'=>'form-inline')) }}
				{{ Form::hidden('id',$task->id) }}
				{{ Form::submit('activate/deactivate tasks for show') }}
				{{ Form::close() }}
//<td><input type='radio' name=radioA1 value='Include'  CHECKED >Include<input type='radio' name=radioA1 value='Exclude'>Exclude</td>
<?php   echo '<br>id='.$task->id; var_dump($task); exit('*exit 20 ');?>
				@endforeach
			</li>
			</ul>
		@else
		<p>Add a new task</p>
		<h2>tasks</h2><hr>
		<?php 
			$maillist_index = "";
			$tasks_index = "";
			$record_type = "";
			$date = "";
			$task_run_mode = "";
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
			
			return View::make('tasks/add')
			->with('title' , $title)
			->with('maillist_index' , $maillist_index)
			->with('tasks_index' , $tasks_index)
			->with('record_type' , $record_type)
			->with('date' , $date)
			->with('task_run_mode' , $task_run_mode)
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
		{{ Form::submit('Create task', array('class'=>'tertiary-btn')) }}
		{{ Form::close() }}
		-->
		@endif
		{{ Form::open(array('url'=>'admin/main','method'=>'GET',)) }}
		{{ Form::submit('Main menu', array('class'=>'tertiary-btn')) }}
		{{ Form::close() }}
		
	

	</div> <!-- end admin -->
	
	
@stop
