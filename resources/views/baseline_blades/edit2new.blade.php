@extends('layouts.main')

@section('content')


<div id="admin" style="width:750px">
	</p>
<!--  
// *****
// first row of buttons
// *****
-->
<?php 

	//var_dump(Input::all());var_dump($passed_to_view_array);
//exit("edit2new exit 16"); 	
	$node_name 							= $passed_to_view_array['report_definition']->node_name;
	$report_name 						= $passed_to_view_array['report_definition']->report_name;
	$snippet_name 						= $passed_to_view_array['snippet_name'];
	$encoded_input 						= $passed_to_view_array['encoded_input'];
	$encoded_report_definition 			= $passed_to_view_array['encoded_report_definition'];
	$encoded_modifiable_fields_array 	= $passed_to_view_array['encoded_modifiable_fields_array'];
	$snippet_string 					= $passed_to_view_array['snippet_string'];
	$data_array_name 					= $passed_to_view_array['record'];
	$lookups		 					= $passed_to_view_array['lookups_array'];
	$record 							= $passed_to_view_array['record'];
	//var_dump($lookups);//var_dump($data_array_name);var_dump($passed_to_view_array);
	//exit("edit2_default_edit exit 35");
	//$coming_from 				= Input::get('coming_from');
	//$generated_files_folder 	= 'generated_files';

/* 

*/

 
?>
<div id="admin" style="width:750px">

	
	</p>
	<div id="update_active_tasks" >Update Selected Record
	<br>
		
		{{ $passed_to_view_array['report_definition']->model_table }}
		
		{{ Form::open(array('url'=>'admin/'.$node_name.'/edit2new', 'method'=>'POST','class'=>'table_inside_update_active_tasks')) }}
		{{ Form::hidden('node_name'							,$node_name) }}
		{{ Form::hidden('coming_from'						,$passed_to_view_array['coming_from']) }}
		{{ Form::hidden('data_key'							,$passed_to_view_array['id']) }}
		
		
		{{ Form::hidden('what_we_are_doing'					,'edit2_default_update') }}

		<p>		
		<div id="div_inside_update_active_tasks" >	<!--div_inside_update_active_tasks -->
		
			<div id="div_inside_update_active_tasks_button_bar" >	<!-- div_inside_update_active_tasks_button_bar -->
				<table id="outer_tbl_0" class="table_inside_update_active_tasks">
				<tr class="table_no_lines">
				<td colspan="4">	
				<table id="inner_tbl_0_0" class="table_no_lines">
					<tr class="table_no_lines">
					<td class="table_no_lines">
						{{ Form::submit('something ') }}
						{{ Form::close() }}
					</td>
			
					<td class="table_no_lines">
		{{ Form::open(array('url'=>'admin/'.$node_name.'/task'
			,'method'=>'POST'
			,'class'=>'table_inside_update_active_tasks')) }}
		{{ Form::hidden('node_name'					,$node_name) }}
		{{ Form::hidden('coming_from'				,$passed_to_view_array['coming_from']) }}
		{{ Form::hidden('what_we_are_doing'			,'edit2_default_update') }}
		{{ Form::submit('atm') }}
		{{ Form::close() }}
					</td>
			
					<td class="table_no_lines">
						{{ Form::open(array('url'=>'admin/'.$node_name.'/edit1', 'method'=>'GET')) }}
						{{ Form::submit('back to Reports menu') }}
						{{ Form::close() }}
					</td>
	
					<td class="table_no_lines">
						{{ Form::open(array('url'=>'admin/main', 'method'=>'GET')) }}
						{{ Form::submit('Main menu' ) }}
						{{ Form::close() }}
					</td>
		</div>			
						</tr>
						
<!--  
*****
// second row of buttons
// *****
--> 
						<?php 
							//echo ('<br>edit.blade 116<br>');print_r(Input::all());exit('exit edit.blade');
						?>
			@if($passed_to_view_array['coming_from'] == "edit1")	
				<tr class='table_no_lines'>

				<td>	
					<!-- modifiable fields -->
					{{ Form::open(array('url'=>'admin/'.$node_name.'/edit4'	,'method'=>'PUT')) }}
					{{ Form::hidden('edit4_option'						,'field_list_edit') }}
					{{ Form::hidden('button_name'						,'update_modifiable_fields') }}
					{{ Form::submit('define_modifiable_fields'			, array('class'=>'mycart-btn-row2')) }}
					{{ Form::close() }}
				</td>		
				<td>
				
				<!-- browse_select_array fields -->
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit4' , 'method'=>'PUT')) }}

				{{ Form::hidden('what_we_are_doing'						,'maintain_modifiable_fields') }}
				{{ Form::hidden('edit4_option'							,'field_list_select') }}
	

				{{ Form::hidden('node_name',$node_name) }}
				{{ Form::hidden('edit4_option','field_list_edit') }}
				{{ Form::hidden('button_name','update browse_select list') }}
				{{ Form::submit('define_browse_fields', array('class'=>'mycart-btn-row2')) }}
				{{ Form::close() }}
			</td>
			
			<td>
				<!-- advanced query fields 
					the other buttons go thru edit4 whereas this button tries to go straight to edit
				-->		
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit' , 'method'=>'GET')) }}
				{{-- Form::hidden('report_key',Input::get('report_key')) --}}
				
				{{ Form::hidden('coming_from','advanced_query') }}
				{{ Form::hidden('button_name','update advanced_query') }}
				{{ Form::submit('define_advanced_query', array('class'=>'mycart-btn-row2')) }}
				{{ Form::close() }}
				</td>
			<td>
				<!-- business rules fields 
					the other buttons go thru edit4 whereas this button tries to go straight to edit
				-->		
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit' , 'method'=>'GET')) }}
				{{ Form::hidden('report_name',$passed_to_view_array['report_definition']->report_name) }}
				{{-- Form::hidden('model_table',Input::get('model_table')) --}}
		
				{{ Form::hidden('coming_from','business_rules') }}
				{{ Form::hidden('button_name','update business_rules') }}
				{{ Form::submit('define_business_rules', array('class'=>'mycart-btn-row2')) }}
				{{ Form::close() }}
				</td>
				</tr>
											
						@endif
	
					</table>
				</td>
				</tr>
				{{ 'modifiable fields for report: ' . $report_name }}
 
				@include($passed_to_view_array['edit_snippet_file_name'])

                                           			
				</table>
				
		</div>   <!-- end div_inside_update_active_tasks -->				
	</div>   <!-- end update_active_tasks -->	
</div> <!-- end admin -->
	
	
@stop