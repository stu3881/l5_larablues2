@extends('layouts.main')

@section('promo')

<section id="promo">     
	<div id="promo-details"> 
		{{ HTML::image('img/sbbsnavlogo.gif', 'SBBS logo')}} 
	</div> <!-- end promo-details -->
</section><!-- promo -->
@stop

@section('content')

		<?php //echo $SelectShift;exit("exit5");?>
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
				
	

	</div> <!-- end admin -->


<?php
// *******
// convert arrays to strings so we can pass them in the form (below)
// *******


	// *********************
	// convert arrays to strings so we can pass them through the form (below)		
	//echo("</br>$current_show_volunteer_link</br>");
	echo("add1.blade 13<br></br>");//exit('exit 28');
	?>
<div id="admin" width="100%">

<div id="update_active_tasks" ><br>
	update active tasks div
	<p>
	{{ Form::open(array('url'=>'admin/'.$this->model_table.'/update2', 'method'=>'PUT','class'=>'table_inside_update_active_tasks')) }}
	{{ Form::hidden('id',Input::get('id')) }}
	<p>		
	<div id="div_inside_update_active_tasks">	
	<table class="table_inside_update_active_tasks">
		<tr class="table_no_lines"><td colspan="4">	
		<table class="table_no_lines">
		<tr class="table_no_lines"><td class="table_no_lines">
			{{ Form::submit('Add this new task') }}
			{{ Form::close() }}
		</td><td>	
			{{ Form::open(array('url'=>'admin/main', 'method'=>'GET')) }}
			{{ Form::submit('Main menu', array('class'=>'cart-btn')) }}
			{{ Form::close() }}
		</td><td>	
			
			{{ Form::open(array('url'=>'admin/'.$table_name, 'method'=>'GET')) }}
			{{ Form::submit($table_name.' menu', array('class'=>'cart-btn')) }}
			{{ Form::close() }}
		</td></tr>
		</table>
		</td></tr>


			<tr>
			<td>
			{{ Form::label('TaskName1') }}
			</td><td>
			{{ Form::text('TaskName1') }}
			</td>
			</tr>
			<tr>
			<td style='width:210px'>
			{{ Form::Label('rb_weekly', 'Included') }} 
			</td><td>
			{{ Form::Radio('active_for_current_show','1', 1, array('id' => 'rb_weekly')) }} 
			</td><td>
			{{ Form::Label('rb_weekly', 'Excluded') }}
			{{ Form::Radio('active_for_current_show','0', 0, array('id' => 'rb_weekly')) }} 
			</td>
			<tr>
			<td style="text-align:left">
				{{-- Form::label('tn1', 'x',array('class' => $one_for_one[$rowcount]['task_name_class'])) --}}
			</td>
			<td style='width:30px'>
				{{-- Form::select($one_for_one[$rowcount]['select_box_name'],$task_shift_array,$task->shift_id) --}}
			</td>
			<td style='width:0px'>
				{{-- Form::label('id', $task->id, array('class' => 'small_numeric_50w')) --}}
			</td>
			</tr>
	
		
		<tr><td colspan="4">	
			<table class="table_no_lines">
			<tr><td>
				{{ Form::submit('Update Active miscThings') }}
				{{-- Form::hidden('all_task_shiftSortOrder_string',$all_task_shiftSortOrder_string) --}}
				
				{{-- Form::hidden('tasks_encoded',$tasks_encoded) --}}
				{{-- Form::hidden('all_task_shift_string',$all_task_shift_string) --}}
				{{-- Form::hidden('current_show_volunteer_link',$current_show_volunteer_link) --}}
				{{-- Form::hidden('one_for_one',$one_for_one) --}}
				{{-- Form::hidden('rowcount',$rowcount) --}}
					
				{{ Form::close() }}
			</td><td>	
				{{ Form::open(array('url'=>'admin/main', 'method'=>'GET')) }}
				{{ Form::submit('Main menu', array('class'=>'cart-btn')) }}
				{{ Form::close() }}
			</td><td>	
				
				{{ Form::open(array('url'=>'admin/'.$table_name, 'method'=>'GET')) }}
				{{ Form::submit($table_name.' menu', array('class'=>'cart-btn')) }}
				{{ Form::close() }}
			</td></tr>
			</table>
		</td></tr>
			</table>
	</div>   <!-- end center_table_div -->	
	</div> <!-- end admin -->

	
@stop
</body>