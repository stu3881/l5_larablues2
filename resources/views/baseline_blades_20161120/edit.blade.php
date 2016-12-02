@extends('layouts.main')

@section('content')
<?php 
	// *****
	// 	$report_snippets_array	= $report_snippets_array;  //passed in
	// *****/
	$table_name = 'to_be_resolved';
	$update_table = "";
	
	$lookups = "";
	$encoded_field_name_array = array();
	$lookups = "";
	$lookups = "";
	$lookups = "";
	$lookups = "";
	$lookups = "";
	 
	//echo ('<br>8 edit.blade<br>');print_r($record);//echo ("<br>$record->table_name<br>");
	//echo ('<br>9 edit.blade<br>');
	//print_r($lookups);//echo ("<br>$record->table_name<br>");

	//$coming_from = $input['coming_from');

	//var_dump($report_snippets_array);
	//$report_snippets_array	= $report_snippets_array;  //passed in
	
	//print_r($report_snippets_array);exit('exit edit.blade 23');
	
	
	//$modifiable_fields_putUpdate = $modifiable_fields_putUpdate;
	//print_r($modifiable_fields_putUpdate);exit('exit edit.blade 15');
	//$encoded_column_names_array = json_encode($column_names_array);
	//print_r($modifiable_fields_putUpdate);exit('exit edit.blade 15');
	//$encoded_browse_select_array 	= json_encode($report_snippets_array['browse_select_array']);
	
	
	
	//exit('exit in edit.blade at 28');

?>
<div id="admin" style="width:750px">
	@if($errors->has())	
	<div id="form-errors">
		<p>The following errors have occurred:</p>
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
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
	<div id="update_active_tasks" >Modify Report Properties
	<br>
		
		for table {{$table_name}}
		
		{{ Form::open(array('url'=>'admin/'.$input['node_name'].'/update', 'method'=>'PUT','class'=>'table_inside_update_active_tasks')) }}
		{{ Form::hidden('key_field_name',$input['key_field_name']) }}
		{{ Form::hidden('key_field_value',$input['key_field_value']) }}
		{{ Form::hidden('coming_from','edit') }}
		{{ Form::hidden('update_table',$update_table) }}
		{{ Form::hidden('encoded_lookups',json_encode($lookups)) }}
		{{-- Form::hidden('encoded_field_name_array',$input['encoded_field_name_array']) --}}						
		{{-- Form::hidden('encoded_required_fields_required_array',$encoded_required_fields_required_array) --}}						
		{{-- Form::hidden('table_name',$table_name) --}}						
		{{-- Form::hidden('snippet_table',$snippet_table) --}}						
		
		<p>		
		<div id="div_inside_update_active_tasks" >	<!--div_inside_update_active_tasks -->
		
			<div id="div_inside_update_active_tasks_button_bar" >	<!-- div_inside_update_active_tasks_button_bar -->
				<table id="outer_tbl_0" class="table_inside_update_active_tasks">
				<tr class="table_no_lines">
				<td colspan="4">	
				<table id="inner_tbl_0_0" class="table_no_lines">
					<tr class="table_no_lines">
					<td class="table_no_lines">
						{{ Form::submit('Update Record') }}
						{{ Form::close() }}
					</td>
			
					<td class="table_no_lines">
						{{ Form::open(array('url'=>'admin/'.$node_name.'/edit1', 'method'=>'GET')) }}
						{{ Form::hidden('table_name',$model_table) }}						
						{{ Form::hidden('node_name',$input['node_name'] }}						
						{{ Form::hidden('snippet_table',$snippet_table) }}						
						{{ Form::hidden('coming_from','edit') }}
						{{ Form::submit('Reports menu') }}
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
			@if($coming_from == "edit1")	
				<tr class='table_no_lines'>

				<td>	
					<!-- modifiable fields -->

					{{ Form::open(array('url'=>'admin/'.$node_name.'/edit4'	,'method'=>'PUT')) }}
					{{ Form::hidden('key_field_name'						,$input['key_field_name']) }}
					{{ Form::hidden('key_field_value'						,$input['key_field_value']) }}
					{{ Form::hidden('report_key'							,$input['report_key']) }}
					{{ Form::hidden('table_name'							,$table_name) }}
					{{ Form::hidden('report_snippet_array_name'				,'modifiable_fields_array') }}
					{{ Form::hidden('generated_snippets_array'				,json_encode($report_snippets_array)) }}
					{{ Form::hidden('report_name'							,$input['report_name']) }}
					{{ Form::hidden('edit4_option'							,'field_list_edit') }}
					{{ Form::hidden('button_name'							,'update_modifiable_fields') }}
					{{ Form::hidden('field_list_array_name'					,'modifiable_fields_array') }}
					{{ Form::submit('define_modifiable_fields'				, array('class'=>'mycart-btn-row2')) }}
					{{ Form::close() }}
				</td>		
				<td>
				
				<!-- browse_select_array fields -->
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit4' , 'method'=>'PUT')) }}
				{{ Form::hidden('key_field_name',$input['key_field_name$input']) }}
				{{ Form::hidden('key_field_value',$input['key_field_value$input']) }}
				{{ Form::hidden('table_name',$table_name) }}
				{{ Form::hidden('report_snippet_array_name','browse_select_array') }}
				{{ Form::hidden('generated_snippets_array',json_encode($report_snippets_array)) }}
				{{ Form::hidden('report_name',$input['report_name$input']) }}
				{{ Form::hidden('edit4_option','field_list_edit') }}
				{{ Form::hidden('button_name','update browse_select list') }}
				{{ Form::hidden('field_list_array_name','browse_select_array') }}
				{{ Form::submit('define_browse_fields', array('class'=>'mycart-btn-row2')) }}
				{{ Form::close() }}
			</td>
			
			<td>
				<!-- advanced query fields 
					the other buttons go thru edit4 whereas this button goes thru edit5
				-->		
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit5' , 'method'=>'PUT')) }}
				{{ Form::hidden('key_field_name',$input['key_field_name$input']) }}
				{{ Form::hidden('key_field_value',$input['key_field_value$input']) }}
				{{ Form::hidden('report_key',$input['report_key$input']) }}
				{{ Form::hidden('table_name',$table_name) }}
				{{ Form::hidden('report_snippet_array_name','required_fields_array') }}
				{{ Form::hidden('generated_snippets_array',json_encode($report_snippets_array)) }}
				{{ Form::hidden('report_name',$input['report_name$input']) }}
		
				{{ Form::hidden('coming_from','advanced_query') }}
				{{ Form::hidden('button_name','update advanced_query') }}
				{{ Form::hidden('field_list_array_name','required_fields_array') }}
				{{ Form::submit('advanced_query', array('class'=>'mycart-btn-row2')) }}
				{{ Form::close() }}
				</td>
			<td>
				<!-- business rules fields 
					the other buttons go thru edit4 whereas this button tries to go straight to edit
				-->		
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit5' , 'method'=>'PUT')) }}
				{{ Form::hidden('key_field_name',$input['key_field_name']) }}
				{{ Form::hidden('key_field_value',$input['key_field_value']) }}
				{{ Form::hidden('report_key',$input['report_key']) }}
				{{ Form::hidden('table_name',$table_name) }}
				{{ Form::hidden('report_snippet_array_name','required_fields_array') }}
				{{ Form::hidden('generated_snippets_array',json_encode($report_snippets_array)) }}
				{{ Form::hidden('report_name',$input['report_name']) }}
				{{ Form::hidden('model_table',$model_table) }}
		
				{{ Form::hidden('coming_from','business_rules') }}
				{{ Form::hidden('button_name','update business_rules') }}
				{{-- Form::hidden('field_list_array_name','required_fields_array') --}}
				{{-- Form::hidden('field_list_array_name',$business_rules_r_o_array) --}}				
				{{ Form::submit('business_rules', array('class'=>'mycart-btn-row2')) }}
				{{ Form::close() }}
				</td>
				</tr>
											
					@endif
	
						</table>
				</td>
				</tr>
		

				@if($coming_from == "edit1")	
					@include($node_name.'/'.'hardcoded_report_getEdit_snippet')
				@endif						
 				@if($coming_from == "edit2")	
 				
					@include($node_name.'/'.$input['generated_files_folder'].'/'.$input['report_key'].'_modifiable_add_save_snippet')
					@endif						
 				@if($coming_from == "advanced_query")	
 		
						@include($node_name.'/'.$input['generated_files_folder'].'/'.$input['report_key'].'_advanced_query_getEdit_snippet')
				@endif	                                                    			
 				@if($coming_from == "business_rules")	
 		
						@include($node_name.'/'.$input['generated_files_folder'].'/'.$input['report_key'].'_business_rules_getEdit_snippet')
				@endif	                                                    			
				</table>
				
		</div>   <!-- end div_inside_update_active_tasks -->				
	</div>   <!-- end update_active_tasks -->	
</div> <!-- end admin -->
	
	
@stop
