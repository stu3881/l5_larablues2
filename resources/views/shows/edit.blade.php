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
	
		</p>
		
		{{ Form::open(array('url'=>'admin/main', 'method'=>'GET','class'=>'form-inline')) }}
		{{ Form::submit('Main menu', array('class'=>'cart-btn')) }}
		{{ Form::close() }}
		
		
		{{ Form::open(array('url'=>'admin/shows/update', 'method'=>'PUT','class'=>'form-inline')) }}
		{{ Form::hidden('id',$id) }}
		{{ Form::hidden('record_type',$record_type) }}	
		{{ Form::submit('Update show') }}
		<p>		
		{{ Form::label('artist') }}
		{{ Form::text('artist',$artist) }}</br>
		{{ Form::label('title') }}
		{{ Form::text('title',$title) }}</br>
		{{ Form::label('date') }}
		{{ Form::text('date',$date) }}
		{{ Form::label('first_shift_start') }}
		{{ Form::text('first_shift_start',$first_shift_start) }}</br>
		{{ Form::label('second_shift_start') }}
		{{ Form::text('second_shift_start',$second_shift_start) }}</br>
		{{ Form::label('third_shift_start') }}
		{{ Form::text('third_shift_start',$third_shift_start) }}</br>
		{{ Form::label('chair_setup_start') }}
		{{ Form::text('chair_setup_start',$chair_setup_start) }}</br>
		{{ Form::label('chair_setup_end') }}
		{{ Form::text('chair_setup_end',$chair_setup_end) }}</br>
		{{-- Form::label('venue_index') --}}
		{{-- Form::text('venue_index',$venue_index) </br>--}}
		{{ Form::hidden('id',$id) }}
		{{-- Form::label('maillist_index') --}}
		{{-- Form::text('maillist_index',$maillist_index) </br>--}}
		{{-- Form::label('tasks_index') --}}
		{{-- Form::text('tasks_index',$tasks_index) </br>--}}
		{{-- Form::label('record_type') --}}
		{{-- Form::text('record_type',$record_type) </br>--}}
		{{-- Form::label('show_run_mode') --}}
		{{-- Form::text('show_run_mode',$show_run_mode) </br>--}}
		{{-- Form::label('demo_mode_last_refreshed_date') --}}
		{{-- Form::text('demo_mode_last_refreshed_date',$demo_mode_last_refreshed_date) </br>--}}
		{{-- Form::label('length') --}}
		{{-- Form::text('length',$length) --}}
		{{-- Form::label('1st_shift_start') --}}
		{{-- Form::text('1st_shift_start',$1st_shift_start) </br>--}}
		{{-- Form::label('2nd_shift_start') --}}
		{{-- Form::text('2nd_shift_start',$2nd_shift_start) </br>--}}
		{{-- Form::label('3rd_shift_start') --}}
		{{-- Form::text('3rd_shift_start',$3rd_shift_start) </br>--}}
		</p>
		{{ Form::submit('Update show') }}
		{{ Form::close() }}
		
		{{ Form::open(array('url'=>'admin/main', 'method'=>'GET','class'=>'form-inline')) }}
		{{ Form::submit('Main menu', array('class'=>'cart-btn')) }}
		{{ Form::close() }}
	
	</div> <!-- end admin -->
	
	
@stop
