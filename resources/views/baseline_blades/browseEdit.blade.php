
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
	echo("ssssssssssssssssssssssss");
	//$key_field_name = $key_field_name;  //passed in
	//echo("../ ".$node_name.' / '.$generated_files_folder.' / '.$report_key.' _browse_select_field_names_row ');
	echo($browse_select_field_count."ep");
	//var_dump($all_records);
	echo($node_name.'/'.$generated_files_folder.'/'.$report_key);
	//print_r($use_table_in_record);//. $all_records[0]);
	//print_r($all_records);//. $all_records[0]);
	//exit('exit 17');
	//$report_key 					= $report_key;
	//$generated_files_folder			= $generated_files_folder;
	//exit('exit 35');


	// $report_generated_snippets_array is passed from getEdit2 controller
	///$generated_snippets_array = $report_generated_snippets_array;
	//print_r($generated_snippets_array);exit('exit edit2 25');
	
	///$lookup_array 							= $generated_snippets_array['lookup_name_value_array_gen_by_table'];
	//$model_table 							= $generated_snippets_array['model_table'];
	///$additional_key 						= $generated_snippets_array[$snippet_table_key_field_name];
	if ($browse_select_field_count > 7) {
		$width = "1500px";
		
	}else {
		$width = "700px";
	}
	//$browse_select_field_count = 9;
	//$browse_select_field_count = 4;
	//print_r($model_table);exit('exit 20');
	//print_r($app_path);exit('exit 20');
	//dd($width,$browse_select_field_count);
	// *********************
	?>
<div id="admin" style="width:90%;">

<div id="update_active_tasks" style="width:95%" ><br>
	update {{$model_table}}
	<p>
	{{ Form::open(array('url'=>'admin/'.$node_name.'/edit1', 'method'=>'GET')) }}
	{{ Form::hidden('key_field_name',$key_field_name) }}
	<p>		
	<div id="div_inside_update_active_tasks" style="width:$width" >	
	<!--  div_inside_update_active_task -->
	<table id="table_inside_update_active_tasks" style="width:$width" >
	<tbody>

		<tr class="table_no_lines">
		<td colspan={{$browse_select_field_count}} >	
		
					<table class="table_no_lines" style="width:100%">
			<tbody>
				<tr class="table_no_lines">
				<td class="table_no_lines">
					{{ Form::submit('reports list') }}
					{{ Form::close() }}
				</td><td>	
					{{ Form::open(array('url'=>'admin/main', 'method'=>'GET')) }}
					{{ Form::hidden('key_field_name',$key_field_name) }}
					{{ Form::submit('main menu', array('class'=>'cart-btn')) }}
					{{ Form::close() }}
				</td>
				<td>	
					{{ Form::open(array('url'=>'admin/'.$node_name, 'method'=>'GET')) }}
					{{ Form::hidden('model_table',$model_table) }}
					{{ Form::submit($model_table.' menu', array('class'=>'cart-btn')) }}
					{{ Form::close() }}
								</td>
				<td>	
					{{ Form::open(array('url'=>'admin/'.$node_name.'/add', 'method'=>'GET')) }}
					{{ Form::hidden('key_field_name'			,$key_field_name) }}
					{{ Form::hidden('generated_files_folder'	,$generated_files_folder) }}
					{{ Form::hidden('key_field_value'			,$key_field_value) }}
					{{ Form::hidden('report_key'				,$report_key) }}
					{{ Form::hidden('model_table'				,$model_table) }}
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
			$classradio = "class=\'bottom_buttons\'";
			//print_r($all_records);exit("108");		
		?>
			@include("../".$node_name.'/'.$generated_files_folder.'/'.$report_key.'_browse_select_field_names_row')
			
			
			<!-- 			
			// *********
			// read loop
			// *********
			 -->
			
			@foreach($all_records as  $record)
			
				<?php 
				$rowcount++;
				$record = (array) $record;
				$key = $key_field_name;
				$submit_button_name = $record[$key_field_name] . " edit";
				if ($use_table_in_record){
					//echo( '$use_table_in_record'.$record['table_name']);exit('exit 187');
					//$record_table_name = $record['table_name'];
				}
				else{
					$record_table_name = $model_table;
				}
				//print_r($record);exit('x156');
				?>
				<tr >
					<td class='border_left'>
					{{$node_name}}
						{{ Form::open(array('url'=>'admin/'.$node_name.'/edit', 'method'=>'GET')) }}
						{{ Form::label('', $rowcount) }} 
					</td>
		
					@include("../".$node_name.'/'.$generated_files_folder.'/'.$report_key.'_browse_select_display_snippet')
					
					<!-- -->
					<td class='text_align_left select_pink' >
						{{ Form::label('', $record['record_type']) }}
					</td>
				<!--	-->

					<!--
						the buttons at the end of the line
					-->
					<td >
						{{ Form::hidden('key_field_name'			,$key_field_name) }}
						{{ Form::hidden('key_field_value'			,$record[$key_field_name]) }}
						{{ Form::hidden('model_table'				,$model_table) }}
						{{ Form::hidden('record_table_name'			,$record_table_name) }}
						{{ Form::hidden('node_name'					,$node_name) }}
						{{ Form::hidden('generated_files_folder'	,$generated_files_folder) }}
						{{ Form::hidden('report_key'				,$report_key) }}
						{{ Form::hidden('app_path'					,$app_path) }}
						{{ Form::submit($submit_button_name) }}
						{{ Form::close() }}
					</td>
					<td >
						{{ Form::open(array('url'=>'admin/'.$node_name.'/edit', 'method'=>'GET')) }}
						{{ Form::hidden('key_field_name'			,$key_field_name) }}
						{{ Form::hidden('key_field_value'			,$record[$key_field_name]) }}
						{{ Form::hidden('model_table'				,$model_table) }}
						{{ Form::hidden('record_table_name'			,$record_table_name) }}
						{{ Form::hidden('node_name'					,$node_name) }}
						{{ Form::hidden('generated_files_folder'	,$generated_files_folder) }}
						{{ Form::hidden('report_key'				,$report_key) }}
						
						{{ Form::hidden('app_path',$app_path) }}
						{{ Form::submit('klone_edit') }}
						{{ Form::close() }}
						</td>
					<td >
						{{ Form::open(array('url'=>'admin/'.$node_name.'/destroy', 'method'=>'POST')) }}
						{{ Form::hidden('key_field_name',$key_field_name) }}
						{{ Form::hidden('key_field_value',$record[$key_field_name]) }}
						{{ Form::submit('delete') }}
						{{ Form::hidden('node_name'					,$node_name) }}
						{{ Form::hidden('generated_files_folder'	,$generated_files_folder) }}
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
')