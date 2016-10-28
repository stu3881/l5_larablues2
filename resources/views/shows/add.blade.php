@extends('layouts.main')

@section('content')
<script>
$(function() {
	//$( "#date" ).datepicker();
	$(".datepicker").datepicker({ dateFormat: "yy-mm-dd",minDate:1 });
	$( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd",minDate:1 } );
});

</script>


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
	
		{{ Form::open(array('url'=>'admin/shows/create','method'=>'POST','class'=>'form-inline')) }}
			
			{{ Form::label('title') }}
			{{ Form::text('title') }}
			
			{{ Form::label('artist') }}
			{{ Form::text('artist') }}
			
			{{--
			<p>{{ Form::text('date', '', array('class' => 'form-control','data-datepicker' => 'datepicker')) }}</p>
			<p>{{ Form::text('date', '', array('class' => 'form-control','id' => 'datepicker')) }}</p>
			{{Form::text('datepicker', '', array('id' => 'datepicker'))}}
			--}}
			
			{{Form::label('Dateq:')}}		
        	{{Form::text('date','', array('id' => 'datepicker','date' => 'datepicker'))}}    
            <!-- <p>Date: <input type="text" id="datepicker"></p>-->

		
{{--		
		<p>		
			{{ Form::label('first_shift_start') }}
			{{ Form::text('first_shift_start') }}
		</p>
		<p>		
			{{ Form::label('second_shift_start') }}
			{{ Form::text('second_shift_start') }}
		</p>
				<p>		
			{{ Form::label('third_shift_start') }}
			{{ Form::text('third_shift_start') }}
		</p>
				<p>		
			{{ Form::label('chair_setup_start') }}
			{{ Form::text('chair_setup_start') }}
		</p>
		<p>		
			{{ Form::label('chair_setup_end') }}
			{{ Form::text('chair_setup_end') }}
		</p>
		
{{--	
		<p>		
			{{ Form::label('venue_index') }}
			{{ Form::text('venue_index') }}
		</p>
			<p>		
			{{ Form::label('maillist_index') }}
			{{ Form::text('maillist_index') }}
		</p>
				<p>		
			{{ Form::label('tasks_index') }}
			{{ Form::text('tasks_index') }}
		</p>
		<p>		
			{{ Form::label('record_type') }}
			{{ Form::text('record_type') }}
		</p>
		
		<p>		
			{{ Form::label('show_run_mode') }}
			{{ Form::text('show_run_mode') }}
		</p>
		<p>		
			{{ Form::label('demo_mode_last_refreshed_date') }}
			{{ Form::text('demo_mode_last_refreshed_date') }}
		</p>
				<p>		
			{{ Form::label('length') }}
			{{ Form::text('length') }}
		</p>
--}}
		
{{--
				<p>		
			{{ Form::label('chair_setup_start') }}
			{{ Form::text('chair_setup_start') }}
		</p>
				<p>		
			{{ Form::label('chair_setup_end') }}
			{{ Form::text('chair_setup_end') }}
		</p>
				<p>		
			{{ Form::label('venue_index') }}
			{{ Form::text('venue_index') }}
		</p>
			//			 $1st_shift_start
			//			 $2nd_shift_start
			//			 $3rd_shift_start
--}}		

		{{ Form::submit('Add Show', array('class'=>'tertiary-btn')) }}
		{{ Form::close() }}

		{{ Form::open(array('url'=>'admin/main', 'method'=>'GET','class'=>'form-inline')) }}
		{{ Form::submit('Main menu', array('class'=>'cart-btn')) }}
		{{ Form::close() }}
				
	

	</div> <!-- end admin -->
@stop
