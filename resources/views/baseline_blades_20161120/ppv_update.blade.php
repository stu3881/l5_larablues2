@extends('layouts.main')

@section('content')

@if (!isset($coming_from))
	{{-- $coming_from = Input::get('coming_from') --}}
@endif
<div id="admin" style="width:750px">
	@if($errors->has())	
	<div id="form-errors">
		<p>The following errors have occurred:</p>
		<ul>
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
<?php 


//var_dump($field_name_array);
//var_dump($r_o_array);

//var_dump($record2);
//var_dump($Input);
 //$generated_files_folder
//->with('record'										,$record_array)
//->with('record2'									,$record_obj)

//exit("ppv_update exit 25"); 
?>
	<div id="update_active_tasks" >ppv_update
	<br>
		
		{{ $record2[0]->model_table }}
		
		{{ Form::open(array('url'=>'admin/'.$node_name.'/edit41', 'method'=>'PUT','class'=>'table_inside_update_active_tasks')) }}

		{{ Form::hidden('node_name',$node_name) }}
		{{ Form::hidden('coming_from'							,Input::get('coming_from')) }}
		{{ Form::hidden('encoded_working_arrays'				,$encoded_working_arrays) }}
		{{ Form::hidden('encoded_record'						,$encoded_record) }}
		{{ Form::hidden('what_we_are_doing'						,Input::get('what_we_are_doing')) }}		
		{{ Form::hidden('edit4_option'							,'update_field_list') }}
		{{ Form::hidden('report_key'							, Input::get('report_key')) }}

	


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
						
											
				
	
					</table>
				</td>
				</tr>
 				@if($Input['what_we_are_doing'] == "ppv_define_query")	
 					@include("../".$node_name.'/'.$generated_files_folder.'/'.Input::get('report_key').'_advanced_query_getEdit_blade')
				@endif	                                                    			
 				@if($Input['what_we_are_doing'] == "ppv_define_business_rules")	
 					@include("../".$node_name.'/'.$generated_files_folder.'/'.Input::get('report_key').'_business_rules_getEdit')
				@endif	                                                    			
				</table>
				
		</div>   <!-- end div_inside_update_active_tasks -->				
	</div>   <!-- end update_active_tasks -->	
</div> <!-- end admin -->
	
	
@stop