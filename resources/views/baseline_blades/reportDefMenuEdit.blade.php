@extends('layouts.main')

@section('content')
<?php 
	// *****
	// 	$report_snippets_array	= $report_snippets_array;  //passed in
	// *****/
	$table_name = 'to_be_resolved';
	$update_table = "";
	//var_dump($miscThing[0]);echo($what_we_are_doing." ** ".$coming_from);
	//echo ('<br>'.$id);

	//exit('exit in reportDefMenuUpdate.blade at 12');
	$lookups = "";
	$encoded_field_name_array = array();
	$lookups = "";
	$lookups = "";
	$lookups = "";
	$lookups = "";
	$lookups = "";
	 
	//echo ('<br>8 edit.blade<br>');print_r($miscThing);//echo ("<br>$miscThing->table_name<br>");
	echo ('<br>reportDefMenuEdit.blade<br>');
	//echo ($report_definition_id);              

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
  
		 {!! Form::model('MiscThing',['method' => 'GET','route'=>[$node_name.'.update',$id]]) !!}
		<input name="_method" type="hidden" value="PUT"> 
		    {{ csrf_field() }}
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
				   		<a href="{{ URL::route($miscThing[0]->node_name.'.indexReports', 
					   		$parameters = array(
					   		'id'=>$miscThing[0]->id,
			   				'reportDefinitionKey'=>$report_definition_id
			   				)
		   				) }}" class="btn mycart-btn-row2">Reports menu</a>
					</td>
		
				<td class="table_no_lines">
					<a href="{{ URL::route('Main.getIndex', $parameters = array('method'=>'GET')) }}" class="btn mycart-btn-row2">Main menu</a>
				</td>
		</div>			
						</tr>
						
<!--  
*****
// second row of buttons
// *****
--> 
			<?php $coming_from = "edit1"; ?>
			@if($coming_from == "edit1")	
				<tr class='table_no_lines'>
<!-- <td> {{--"just a test"--}}</td>-->
				<td>
					<!-- modifiable fields -->
	  		        <a href="{{ URL::route($node_name.'.reportDefMenuEdit', $parameters = array('id'=>$id, 'what_we_are_doing'=>'maintain_modifiable_fields','coming_from'=> 'reportDefMenuEdit')) }}" class="btn mycart-btn-row2">maintain_modifiable_fields</a>
				<td>
				
				<!-- browse_select_array fields -->
		        
	  		        <a href="{{ URL::route($node_name.'.reportDefMenuEdit', $parameters = array('id'=>$id, 
	  		        'what_we_are_doing'=>'maintain_browse_fields',
	  		        'coming_from'=> 'reportDefMenuEdit')) }}" class="btn mycart-btn-row2">maintain_browse_fields</a>


			</td>
			
			<td>
				<!-- advanced query fields -->		
  		        <a href="{{ URL::route($node_name.'.reportDefMenuEdit', $parameters = array('id'=>$id, 
  		        'what_we_are_doing'=>'ppv_define_query',
  		        'coming_from'=> 'reportDefMenuEdit')) }}" class="btn mycart-btn-row2">
  		        advanced_query
  		        </a>
			</td>
			<td>
				<!-- business rules fields -->		
  		        <a href="{{ URL::route($node_name.'.reportDefMenuEdit', $parameters = array('id'=>$id, 
  		        'what_we_are_doing'=>'ppv_define_business_rules',
  		        'coming_from'=> 'reportDefMenuEdit')) }}" class="btn mycart-btn-row2">
  		        business_rules
  		        </a>
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
			@include($node_name.'/'.$request->input('generated_files_folder').'/'.$id.'_modifiable_add_save_snippet')
		@endif		
			
		@if($coming_from == "advanced_query")	
			@include($node_name.'/'.$request->input('generated_files_folder').'/'.$id.'_ppv_edit_snippet')
		@endif	                                                    			
				
		@if($coming_from == "business_rules")	
			@include($node_name.'/'.$request->input('generated_files_folder').'/'.$id.'_ppv_edit_snippet')
		@endif	
                                            			
		</table>
				
		</div>   <!-- end div_inside_update_active_tasks -->				
	</div>   <!-- end update_active_tasks -->	
</div> <!-- end admin -->
	
	
@stop
