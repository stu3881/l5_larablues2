@extends('layouts.main')

@section('content')
<?php 
	//echo("inside advanced edits");
	//var_dump(Input::all());
	//var_dump($record[0]);
	//exit("inside advanced edits exit 7");


	//echo("edit 48");print_r($table_name);//exit('exit edit.blade8');

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
		uuuuuuuuuuuuuuuuuuuuuu
	</div> 
	<!-- end form-errors -->			
	@endif
	
	</p>
<!--  
// *****
// first row of buttons update, reports, main menu
// *****
-->
	<div id="update_active_tasks" >Modify Report Properties
	<br>
		
		updating table {{$record[0]->table_name }}
		
		{{ Form::open(array('url'=>'admin/'.$node_name.'/update', 'method'=>'PUT','class'=>'table_inside_update_active_tasks')) }}
		{{ Form::hidden('what_we_are_doing'			,'update_report_name') }}
		{{ Form::hidden('coming_from'				,'edit_name_advanced_edits') }}


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
						{{ Form::hidden('node_name',$node_name) }}						
						{{-- Form::hidden('snippet_table',$snippet_table)--}}						
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
			<tr class='table_no_lines'>

			<td>	
				<!-- modifiable fields -->

				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit41','method'=>'PUT')) }}
				{{ Form::hidden('logical_button_name'					,'maintain_modifiable_fields') }}	
				{{ Form::hidden('what_we_are_doing'						,'maintain_modifiable_fields') }}
				{{ Form::hidden('edit4_option'							,'field_list_select') }}	
				{{ Form::hidden('report_key'							, Input::get('report_key')) }}
				{{ Form::hidden('encoded_working_arrays'				,$encoded_working_arrays) }}
				{{ Form::hidden('encoded_record'						,$encoded_record) }}

				{{ Form::submit('define_modifiable_fields', array('class'=>'mycart-btn-row2')) }}
				{{ Form::close() }}
			</td>		
			<td>
				<!-- browse_select_array fields -->
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit41' , 'method'=>'PUT')) }}
				{{ Form::hidden('logical_button_name'					,'maintain_browse_fields') }}
				{{ Form::submit('define_browse_fields', array('class'=>'mycart-btn-row2')) }}
				{{ Form::hidden('logical_button_name'						,'maintain_browse_fields') }}

				{{ Form::hidden('edit4_option'							,'field_list_select') }}
				{{ Form::hidden('what_we_are_doing'						,'maintain_browse_fields') }}	
				{{ Form::hidden('report_key'							, Input::get('report_key')) }}

				{{ Form::hidden('encoded_working_arrays'					,$encoded_working_arrays) }}
				{{-- Form::hidden('encoded_column_names'					,$encoded_column_names) --}}
				{{ Form::hidden('encoded_record'						,$encoded_record) }}
				{{ Form::close() }}
			</td>
			
			<td>
				<!-- advanced query fields 
					
				-->		
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit41' , 'method'=>'PUT')) }}
				{{ Form::hidden('logical_button_name'						,'ppv_define_query') }}
				{{ Form::hidden('edit4_option'							,'field_list_select') }}
				{{ Form::hidden('what_we_are_doing'						,'ppv_define_query') }}			
				{{ Form::hidden('report_key'							, Input::get('report_key')) }}
					
				{{ Form::hidden('encoded_working_arrays'				,$encoded_working_arrays) }}
				{{-- Form::hidden('encoded_column_names'				,$encoded_column_names) --}}
				{{ Form::hidden('encoded_record'						,$encoded_record) }}

				{{ Form::hidden('report_snippet_array_name'				,'required_fields_array') }}
				{{ Form::hidden('generated_snippets_array'				,'report_snippets_array') }}
				{{ Form::hidden('report_name'							,Input::get('report_name')) }}
		
				{{ Form::hidden('field_list_array_name'					,'required_fields_array') }}
				{{ Form::submit('advanced_query'						, array('class'=>'mycart-btn-row2')) }}
				{{ Form::close() }}
				</td>
			<td>
				<!-- business rules fields 
					the other buttons go thru edit4 whereas this button tries to go straight to edit
				-->		
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit41' , 'method'=>'PUT')) }}
				{{ Form::hidden('logical_button_name'					,'ppv_define_business_rules') }}
				{{ Form::hidden('edit4_option'							,'field_list_select') }}
				{{ Form::hidden('what_we_are_doing'						,'ppv_define_business_rules') }}	
				{{ Form::hidden('report_key'							, Input::get('report_key')) }}
	
				{{ Form::hidden('encoded_working_arrays'				,$encoded_working_arrays) }}
				{{-- Form::hidden('encoded_column_names'				,$encoded_column_names) --}}
				{{ Form::hidden('encoded_record'						,$encoded_record) }}
				
				{{ Form::hidden('report_snippet_array_name'				,'required_fields_array') }}
				{{ Form::hidden('generated_snippets_array'				,'report_snippets_array') }}
				{{ Form::hidden('report_name'							,Input::get('report_name')) }}
				
				{{ Form::hidden('field_list_array_name'					,'required_fields_array') }}
				{{ Form::submit('business_rules'						, array('class'=>'mycart-btn-row2')) }}
				{{ Form::close() }}
				</td>
				</tr>
											
				
	
						</table>
				</td>
				</tr>
		

					@include($node_name.'/'.'hardcoded_report_getEdit_snippet')
 				</table>
				
		</div>   <!-- end div_inside_update_active_tasks -->				
	</div>   <!-- end update_active_tasks -->	
</div> <!-- end admin -->
	
	
@stop
