@extends('layouts.main')

@section('content')
<?php 
	// *****
	// 	$report_snippets_array	= $report_snippets_array;  //passed in
	// *****
	//echo ('<br>edit.blade<br>');print_r(Input::all());exit('exit edit.blade');
	$coming_from = Input::get('coming_from');
	if ($coming_from == "edit1") {
		$working_fields_array =  (array) json_decode(Input::get('encoded_field_name_array'));
		$encoded_required_fields_required_array 	= "";
		$table_name = Input::get('table_name');
	}
		
	if ($coming_from == "edit2") {
		//echo ('<br>edit.blade<br>');print_r($report_snippets_array);exit('exit edit.blade');
		$working_fields_array = (array) $report_snippets_array['modifiable_fields_array'];
		//echo ('<br>edit.blade<br>');print_r($working_fields_array);exit('18exit edit.blade');
		$encoded_field_name_array 	= json_encode($report_snippets_array['modifiable_fields_array']);
		$encoded_required_fields_required_array 	= json_encode($report_snippets_array['required_fields_required_array']);
		//echo ('<br>edit.blade<br>');print_r($encoded_required_fields_required_array);exit('22exit edit.blade');
		$table_name = $report_snippets_array['table_name'];		
	}
	
	$report_table = Input::get('report_table');
	$report_snippets_array	= $report_snippets_array;  //passed in
	
	//print_r($report_snippets_array);exit('exit edit.blade 23');
	
	
	//$modifiable_fields_putUpdate = $modifiable_fields_putUpdate;
	//print_r($modifiable_fields_putUpdate);exit('exit edit.blade 15');
	//$encoded_column_names_array = json_encode($column_names_array);
	//print_r($modifiable_fields_putUpdate);exit('exit edit.blade 15');
	//$encoded_browse_select_array 	= json_encode($report_snippets_array['browse_select_array']);
	
	
	//print_r($table_name);exit('exit edit.blade8');

?>
<div id="admin" style="width:750px">
	@if($errors->has())	
	<div id="form-errors">
		<p>The following errors have occurred:</p>
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error}}</li>
			@endforeach
		</ul>
	</div> 
	<!-- end form-errors -->			
	@endif
	
	</p>
<!--  
// *****
// first row of buttons
// *****
-->
	<div id="update_active_tasks" >update active tasks
	<br>
		update records
		<p>
		
		you're in edit blade
		
		{{ Form::open(array('url'=>'admin/'.$report_table.'/update', 'method'=>'PUT','class'=>'table_inside_update_active_tasks')) }}
		{{ Form::hidden('key_field_name',Input::get('key_field_name')) }}
		{{ Form::hidden('key_field_value',Input::get('key_field_value')) }}
		{{ Form::hidden('coming_from',Input::get('coming_from')) }}
		{{ Form::hidden('encoded_field_name_array',Input::get('encoded_field_name_array')) }}						
		{{ Form::hidden('encoded_required_fields_required_array',$encoded_required_fields_required_array) }}						
		
		<p>		
		<div id="div_inside_update_active_tasks" >	div_inside_update_active_tasks
			<div id="div_inside_update_active_tasks_button_bar" >	div_inside_update_active_tasks_button_bar
				<table id="outer_tbl_0" class="table_inside_update_active_tasks">
				<tr class="table_no_lines">
				<td colspan="2">	
				<table id="inner_tbl_0_0" class="table_no_lines">
					<tr class="table_no_lines">
					<td class="table_no_lines">
						{{ Form::submit('Update Record') }}
						{{ Form::close() }}
					</td>
			
					<td class="table_no_lines">
						{{ Form::open(array('url'=>'admin/'.$report_table.'/edit1', 'method'=>'GET')) }}
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
	//echo ('<br>edit.blade<br>');print_r(Input::all());exit('exit edit.blade');
						?>
					@if($coming_from == "edit1")	
				<tr class='table_no_lines'>

				<td>	
					<!-- modifiable fields -->
					{{ Form::open(array('url'=>'admin/miscThings/edit4'	,'method'=>'GET')) }}
					{{ Form::hidden('key_field_name'										,Input::get('key_field_name')) }}
					{{ Form::hidden('key_field_value'										,Input::get('key_field_value')) }}
					{{ Form::hidden('report_key'												,Input::get('report_key')) }}
					{{ Form::hidden('table_name'												,$table_name) }}
					{{ Form::hidden('report_snippet_array_name'					,'modifiable_fields_array') }}
					{{ Form::hidden('generated_snippets_array'					,json_encode($report_snippets_array)) }}
					{{ Form::hidden('report_name'												,Input::get('report_name')) }}
					{{ Form::hidden('edit4_option'											,'field_list_edit') }}
					{{ Form::hidden('button_name'												,'update_modifiable_fields') }}
					{{ Form::hidden('field_list_array_name'							,'modifiable_fields_array') }}
					{{ Form::submit('define_modifiable_fields'					, array('class'=>'mycart-btn-row2')) }}
					{{ Form::close() }}
				</td>		
				<td>
				
				<!-- browse_select_array fields -->
				{{ Form::open(array('url'=>'admin/miscThings/edit4' , 'method'=>'GET')) }}
				{{ Form::hidden('key_field_name',Input::get('key_field_name')) }}
				{{ Form::hidden('key_field_value',Input::get('key_field_value')) }}
				{{ Form::hidden('table_name',$table_name) }}
				{{ Form::hidden('report_snippet_array_name','browse_select_array') }}
				{{ Form::hidden('generated_snippets_array',json_encode($report_snippets_array)) }}
				{{ Form::hidden('report_name',Input::get('report_name')) }}
				{{ Form::hidden('edit4_option','field_list_edit') }}
				{{ Form::hidden('button_name','update browse_select list') }}
				{{ Form::hidden('field_list_array_name','browse_select_array') }}
				{{ Form::submit('define_browse_fields', array('class'=>'mycart-btn-row2')) }}
				{{ Form::close() }}
			</td>
			
			<td>
				<!-- required_fields_array fields -->			
				{{ Form::open(array('url'=>'admin/miscThings/edit4' , 'method'=>'GET')) }}
				{{ Form::hidden('key_field_name',Input::get('key_field_name')) }}
				{{ Form::hidden('key_field_value',Input::get('key_field_value')) }}
				{{ Form::hidden('table_name',$table_name) }}
				{{ Form::hidden('report_snippet_array_name','required_fields_array') }}
				{{ Form::hidden('generated_snippets_array',json_encode($report_snippets_array)) }}
				{{ Form::hidden('report_name',Input::get('report_name')) }}
				{{ Form::hidden('edit4_option','field_list_edit') }}
				{{ Form::hidden('button_name','update required_fields_array') }}
				{{ Form::hidden('field_list_array_name','required_fields_array') }}
				{{ Form::submit('define_required_fields', array('class'=>'mycart-btn-row2')) }}
				{{ Form::close() }}
				</td>
			
			<td>
				<!-- advanced query fields -->			
				{{ Form::open(array('url'=>'admin/miscThings/edit4' , 'method'=>'GET')) }}
				{{ Form::hidden('key_field_name',Input::get('key_field_name')) }}
				{{ Form::hidden('key_field_value',Input::get('key_field_value')) }}
				{{ Form::hidden('table_name',$table_name) }}
				{{ Form::hidden('report_snippet_array_name','required_fields_array') }}
				{{ Form::hidden('generated_snippets_array',json_encode($report_snippets_array)) }}
				{{ Form::hidden('report_name',Input::get('report_name')) }}
				{{ Form::hidden('edit4_option','advanced_query') }}
				{{ Form::hidden('button_name','update required_fields_array') }}
				{{ Form::hidden('field_list_array_name','required_fields_array') }}
				{{ Form::submit('define_advanced_query', array('class'=>'mycart-btn-row2')) }}
				{{ Form::close() }}
				</td>
				</tr>
											
					@endif
	
						</table>
				</td>
				</tr>
		

				@if($coming_from == "edit1")	
					@include($report_table.'/'.'hardcoded_report_getEdit_snippet')
					
				
				@endif						
 				
				@if($coming_from == "edit2")	
					@include($report_table.'/'.Input::get('report_key').'_modifiable_fields_getEdit_snippet')
				@endif						
 				
				
				</table>
				
		</div>   <!-- end div_inside_update_active_tasks -->				
	</div>   <!-- end update_active_tasks -->	
</div> <!-- end admin -->
	
	
@stop
