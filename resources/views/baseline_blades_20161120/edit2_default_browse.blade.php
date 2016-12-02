@extends('layouts.main')
@section('promo')

<section id="promo">     
	<div id="promo-details"> 
		browse edit
	</div> <!-- end promo-details -->
</section><!-- promo -->i
@stop

@section('content')

<?php
	// *******
	//var_dump($input);
	//var_dump($miscThings);
	//var_dump($node_name);
	//var_dump($model_table);
	//var_dump($laravel_snippets_array);exit("exit edit2_default_browse");


	//var_dump($passed_to_view_array);
	//exit("exit edit2_default_browse at 18");
/*	
	//$miscThings 			= $passed_to_view_array['miscThings'];
	//$record 					= $passed_to_view_array['miscThings'];
	//$all_records 				= $passed_to_view_array['all_records'];	
	//$encoded_input 				= $passed_to_view_array['encoded_input'];
	$key_field_name 			= $passed_to_view_array['key_field_name'];
	//$encoded_miscThings 	= $passed_to_view_array['encoded_miscThings'];

	$generated_files_folder 	= $passed_to_view_array['generated_files_folder'];
	$all_records_obj 			= $passed_to_view_array['all_records_obj'][0];
	$input 						= $passed_to_view_array['input'];
	$key_field_name 			= $passed_to_view_array['key_field_name'];

	// these two are referenced in the partial view
	$snippets_array = ($passed_to_view_array['snippets_array']);
	$field_names_array = $passed_to_view_array['field_names_array'];
*/
	//var_dump($input );
	//var_dump($passed_to_view_array );exit("exit edit2_default_browse at 31");
	//var_dump($miscThings );exit("exit edit2_default_browse at 31");
	//var_dump($all_records_obj);exit("exit edit2_default_browse");

	
	//var_dump("encoded_miscThings");
	$browse_select_field_count = 6;
		if ($browse_select_field_count > 7) {
		$width = "1500px";
		
	}else {
		$width = "700px";
	}
	

	//exit("exit edit2_default_browse");
	// *********************
	?>
<div id="admin" style="width:90%;">

<div id="update_active_tasks" style="width:95%" ><br>
	browse {{$node_name}}
	<p>
	{{ Form::open(array('url'=>'admin/'.$node_name.'/edit1', 'method'=>'GET')) }}

	<p>		
	<div id="div_inside_update_active_tasks" style="width:$width" >	
	<!--  div_inside_update_active_task -->
	<table id="table_inside_update_active_tasks" style="width:$width" >
	<tbody>

		<tr class="table_no_lines">
		<td colspan=5{{--$browse_select_field_count--}} >	
		
		<table class="table_no_lines" style="width:100%">
			<tbody>
				<tr class="table_no_lines">
				<td class="table_no_lines">
					{{ Form::submit('reports list') }}
					{{ Form::close() }}
				</td><td>	
					{{ Form::open(array('url'=>'admin/main', 'method'=>'GET')) }}
					{{ Form::submit('main menu', array('class'=>'cart-btn')) }}
					{{ Form::close() }}
				</td>
				<td>	
					{{ Form::open(array('url'=>'admin/'.$node_name, 'method'=>'GET')) }}
					{{ Form::submit($model_table.' menu', array('class'=>'cart-btn')) }}
					{{ Form::close() }}
				</td>
				<td>	
					{{ Form::open(array('url'=>'admin/'.$node_name.'/edit2new', 'method'=>'PUT')) }}
					{{ Form::submit('add new record', array('class'=>'mycart-btn-row2')) }}
					{{ Form::close() }}

				</td>
				</tr>
			</tbody>
			</table>
		
		 
		</td>
		</tr>

		<?php 
			$rowcount = -1;
			$save_shift_id = "";
			//$classradio = "class=\'bottom_buttons\'";
			//print_r($all_records);exit("108");		


		?>
		
			@include("../".$node_name.'/'.$generated_files_folder.'/'.$report_key.'_browse_select_field_names_row')
			
			
			<!-- 			
			// *********
			// read loop
			// *********
			 -->
			
			@foreach($miscThings as  $record)
				<?php 
				$rowcount++;
				//$record = (array) $record;
				//var_dump($record );exit("exit edit2_default_browse at 121");
				//echo("record type". $record->record_type);
				//var_dump($record[0] );exit("exit edit2_default_browse at 121");
				?>
					<td class='border_left'>
						{{ Form::open(array('url'=>'admin/'.$node_name.'/edit2new', 'method'=>'PUT')) }}
						{{ Form::label('', $rowcount) }} 
					</td>
		
					
				<?php 
				/*
				@include("../".$node_name.'/'.$generated_files_folder.'/'.$report_key.'_snippet_string')
				we're trying to replace this (above) so we don't have to maintain a file
				echo($passed_to_view_array['browse_select_loop_str']); 
				the snippet_string includes needs $data_array_name
				@include("../baseline_blades/". "displays_array_of_fields.blade")
				the trouble with this approach is that you have to define the prefine and suffix strings and define an array of field names
				we're going back to 
				*/
				?>
				
				
		@include("../".$node_name.'/'.$generated_files_folder.'/'.$report_key.'_snippet_string')

	<!--
		the buttons at the end of the line
	-->
					<td >
						{{ Form::hidden('what_we_are_doing'			,'edit2_default_edit') }}
						{{ Form::hidden('edit4_option'				,'field_list_select') }}	
						{{ Form::hidden('coming_from'				,'edit2_edit_button') }}	
						{{ Form::hidden('key_field_name'			,$key_field_name) }}
	
		
						{{ Form::hidden('add_update_button_name'	,'update') }}				
		
		
						{{-- Form::hidden('model_table'				,$model_table) --}}
						{{-- Form::hidden('record_table_name'			,$record_table_name) --}}
						{{-- Form::hidden('node_name'					,$node_name) --}}
						{{-- Form::hidden('generated_files_folder'	,$generated_files_folder) --}}
						{{ Form::hidden('report_key'				,$report_key) }}
						{{-- Form::hidden('app_path'					,$app_path) --}}

						{{ Form::submit('edit') }}
						{{ Form::close() }}
					</td>
					<td >
						{{ Form::open(array('url'=>'admin/'.$node_name.'/edit', 'method'=>'GET')) }}
						{{-- Form::hidden('key_field_name'			,$key_field_name) --}}
						{{-- Form::hidden('model_table'				,$model_table) --}}
						{{-- Form::hidden('record_table_name'			,$record_table_name) --}}
						
						{{-- Form::hidden('app_path',$app_path) --}}
						{{ Form::submit('klone_edit') }}
						{{ Form::close() }}
						</td>
					<td >
						{{ Form::open(array('url'=>'admin/'.$node_name.'/destroy', 'method'=>'POST')) }}
						{{ Form::submit('delete') }}
						{{ Form::close() }}
					</td>
				</tr>

			@endforeach
		
		</tbody>
		</table>
	</div>   <!-- end center_table_div -->	
<script>
//document.getElementById("table_inside_update_active_tasks").style.width) = 3000;
//alert (document.getElementById("table_inside_update_active_tasks").style.width+"*"+document.getElementById("div_inside_update_active_tasks").style.width);
//alert ("fuck");

</script>
	<script>
//write document.getElementById("div_inside_update_active_tasks").width = "2000px";
if (document.getElementById("table_inside_update_active_tasks").style.width > document.getElementById("div_inside_update_active_tasks").style.width) {
	document.getElementById("table_inside_update_active_tasks ").style.background_color = "#FF8C00";
	document.getElementById("table_inside_update_active_tasks ").style.width = document.getElementById("table_inside_update_active_tasks").style.width="3000px";
	//alert (document.getElementById("table_inside_update_active_tasks ").style.width);
}

</script>
	
	</div> <!-- end admin -->

	
@stop
</body>
