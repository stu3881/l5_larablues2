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

/*
var_dump($record);
var_dump($record2);
var_dump($Input);

->with('record'										,$record_array)
->with('record2'									,$record_obj)
*/
//exit("edit5 exit 25"); 
?>
	<div id="update_active_tasks" >Update Selected Record
	<br>
		
		{{ $record2[0]->model_table }}
		
		{{ Form::open(array('url'=>'admin/'.$node_name.'/update', 'method'=>'PUT','class'=>'table_inside_update_active_tasks')) }}
		{{-- Form::hidden('encoded_what_we_are_doing_arrays',$encoded_what_we_are_doing_arrays) --}}
		{{ Form::hidden('node_name',$node_name) }}
		{{ Form::hidden('coming_from',Input::get('coming_from')) }}

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
	
				{{ Form::hidden('encoded_what_we_are_doing_arrays'		,$encoded_what_we_are_doing_arrays) }}
				{{ Form::hidden('encoded_column_names'					,$encoded_column_names) }}
				{{ Form::hidden('encoded_record'						,$encoded_record) }}

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
				{{ Form::hidden('report_key',Input::get('report_key')) }}
				
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
				{{ Form::hidden('report_name',Input::get('report_name')) }}
				{{ Form::hidden('model_table',Input::get('model_table')) }}
		
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
		{{ $record2[0]->report_name }}

				@if($coming_from == "edit1")	
					@include($node_name.'/'.'hardcoded_report_getEdit_snippet')
					<?php 
					echo ('coming_from'.$coming_from);//exit('exit 202');
					?>
				@endif						
 				@if($coming_from == "edit2")	
 					<?php 
						echo ('coming_from'.$coming_from);//exit('exit 202');
						
						//echo ('edit_blade');exit('exit 196'); ?>
					@include("../".$node_name.'/'.$generated_files_folder.'/'.Input::get('report_key').'_modifiable_fields_getEdit_snippet')
				@endif						
 				@if($coming_from == "advanced_query")	
 					@include("../".$node_name.'/'.$generated_files_folder.'/'.Input::get('report_key').'_advanced_query_getEdit_blade')
				@endif	                                                    			
 				@if($coming_from == "business_rules")	
 					@include("../".$node_name.'/'.$generated_files_folder.'/'.Input::get('report_key').'_business_rules_getEdit')
				@endif	                                                    			
				</table>
				
		</div>   <!-- end div_inside_update_active_tasks -->				
	</div>   <!-- end update_active_tasks -->	
</div> <!-- end admin -->
	
	
@stop