@extends('layouts.main')

@section('content')
<?php 
	// *****
	// 	$report_snippets_array	= $report_snippets_array;  //passed in
	// *****/
	$table_name = 'to_be_resolved';
	$update_table = "";
	//var_dump($miscThing);
	//exit('exit in edit.blade at 12');
	$lookups = "";
	$encoded_field_name_array = array();
	$lookups = "";
	$lookups = "";
	$lookups = "";
	$lookups = "";
	$lookups = "";
	 
	//echo ('<br>8 edit.blade<br>');print_r($miscThing);//echo ("<br>$miscThing->table_name<br>");
	//echo ('<br>9 edit.blade<br>');
	//print_r($lookups);//echo ("<br>$miscThing->table_name<br>");

	//$coming_from = $input['coming_from');

	//var_dump($report_snippets_array);
	//$report_snippets_array	= $report_snippets_array;  //passed in
	
	//print_r($report_snippets_array);exit('exit edit.blade 23');
	
	
	//$modifiable_fields_putUpdate = $modifiable_fields_putUpdate;
	//print_r($modifiable_fields_putUpdate);exit('exit edit.blade 15');
	//$encoded_column_names_array = json_encode($column_names_array);
	//print_r($modifiable_fields_putUpdate);exit('exit edit.blade 15');
	//$encoded_browse_select_array 	= json_encode($report_snippets_array['browse_select_array']);
	
	
	
	//exit('exit in edit.blade at 39');

?>
	
	</p>
<!--  
// *****
// first row of buttons
// *****
-->
	<div id="update_active_tasks" >Modify Report Properties
	<br>
		
		for table {{$node_name}}
		 {{ csrf_field() }}
  
		 {!! Form::model('MiscThing',['method' => 'PATCH','route'=>[$node_name.'.update',$miscThing->id]]) !!}
		<p>		
		<div id="div_inside_update_active_tasks" >	<!--div_inside_update_active_tasks -->
		
			<div id="div_inside_update_active_tasks_button_bar" >	<!-- div_inside_update_active_tasks_button_bar -->
				<table id="outer_tbl_0" class="table_inside_update_active_tasks">
				<tr class="table_no_lines">
				<td colspan="4">	
				<table id="inner_tbl_0_0" class="table_no_lines">
					<tr class="table_no_lines">
				    <td class="table_no_lines">
		             	<a href="{{route($node_name.'.update',$miscThing->id)}}" >
		             	xUpdatex Record</a>
	            	</td>

					<td class="table_no_lines">
						{{ Form::submit('Update Record') }}
						{{ Form::close() }}
					</td>
			
					<td class="table_no_lines">
						{{-- Form::open(array('url'=>'admin/'.$node_name.'/edit1', 'method'=>'GET')) --}}
		             	<a href="{{route($node_name.'.browseEdit',$miscThing->id)}}" class="table_no_lines">
		             	Reports menu</a>

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
						$coming_from = "edit1";
						?>
			@if($coming_from == "edit1")	
				<tr class='table_no_lines'>

				<td>	
					<!-- modifiable fields -->

					{{-- Form::open(array('url'=>'admin/'.$node_name.'/edit4'	,'method'=>'PUT')) --}}
		             	<a href="{{route($node_name.'.browseEdit',$miscThing->id)}}" class="mycart-btn-row2">
		             	define_modifiable_fields</a>
					{{-- Form::submit('define_modifiable_fields'				, array('class'=>'mycart-btn-row2')) --}}
				</td>		
				<td>
				
				<!-- browse_select_array fields -->
				{{-- Form::open(array('url'=>'admin/'.$node_name.'/edit4' , 'method'=>'PUT')) --}}
		             	<a href="{{route($node_name.'.browseEdit',$miscThing->id)}}" class="mycart-btn-row2">
		             	define_browse_fields</a>
				{{-- Form::submit('define_browse_fields', array('class'=>'mycart-btn-row2')) --}}

			</td>
			
			<td>
				<!-- advanced query fields 
					the other buttons go thru edit4 whereas this button goes thru edit5
				-->		
				{{-- Form::open(array('url'=>'admin/'.$node_name.'/edit5' , 'method'=>'PUT')) --}}
				{{-- Form::submit('advanced_query', array('class'=>'mycart-btn-row2')) --}}
				{{-- Form::close() --}}
		             	<a href="{{route($node_name.'.browseEdit',$miscThing->id)}}" class="mycart-btn-row2">
		             	advanced_query</a>
				</td>
			<td>
				<!-- business rules fields 
					the other buttons go thru edit4 whereas this button tries to go straight to edit
				-->		
				{{-- Form::open(array('url'=>'admin/'.$node_name.'/edit5' , 'method'=>'PUT')) --}}
				{{-- Form::submit('business_rules', array('class'=>'mycart-btn-row2')) --}}
		             	<a href="{{route($node_name.'.browseEdit',$miscThing->id)}}" class="mycart-btn-row2">
		             	business_rules</a>
				{{-- Form::close() --}}
				</td>
				</tr>
											
					@endif
	
						</table>
				</td>
				</tr>
		
{{$miscThing->id}} {{$miscThing->report_name}} {{$coming_from}}

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
