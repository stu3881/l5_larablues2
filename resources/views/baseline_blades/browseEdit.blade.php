@extends('layouts.main')
@section('promo')

<section id="promo">   
	browseEdit  
	<div id="promo-details"> 

		{{ HTML::image('/img/Alfa120pct.JPG', '69 myalfa',array('height'=>'172px'))}} 


		</div> <!-- end promo-details -->
</section><!-- promo -->
@stop


@section('content')
		BrowseEdit Defined Reports

<?php
	//var_dump($all_records);exit("edit1.blade 17 ");
	$what_we_are_doing = 'what_we_are_doing';
	$coming_from = 'edit1';

$rowcount = -1;
// *******
// *******

	//exit('exit 29');
/*	
	//$encoded_field_name_array = json_encode($field_name_array);
*/
	$i = count($all_records) + 1;
	if ($i > 1){
		//print_r($i);print_r($_REQUEST);
		//print_r($generated_snippets_array);exit('exit 29');
		//exit('exit 20');
	}
	//print_r( $encoded_field_name_array);//exit('exit 22');
	//print_r($all_records[0]->model_table);exit('exit 33');

	//$lookup_array = $generated_snippets_array['lookup_name_value_array_gen_by_table'];
	
	//print_r($all_records[0]->model_table);exit('$all_records[0]->model_table exit 20');
	//$browse_select_field_count = count($browse_select_array);//$lookup_array = $lookup_array;
	$browse_select_field_count = 7;
	//$browse_select_field_count = $browse_select_field_count + 4;
	if ($browse_select_field_count > 7) {
		$width = "1500px";
		
	}else {
		$width = "700px";
	}
		
	// *********************
	?>
	
	<div id="admin" style="width:800px;height:99%">
	
	{{ Form::open(array('url'=>'admin/'.$node_name.'/add'	,'method'=>'GET')) }}
	{{ Form::hidden('key_field_name'						,$all_records[0]->key_field_name) }}
	{{-- Form::hidden('encoded_field_name_array'				,$encoded_field_name_array) --}}
	{{ Form::hidden('model_table'							,$all_records[0]->model_table) }}
	{{ Form::hidden('node_name'								,$node_name) }}
	{{-- Form::hidden('snippet_table'							,$snippet_table) --}}
	{{ Form::hidden('record_type'							,'report_definition') }}
	{{ Form::hidden('coming_from'							,'edit1_define_new_report') }}
	
	<div id="update_active_tasks" ><br>
	
                      	updating   {{$all_records[0]->model_table}} table
	<p>
	<p>		
	<div id="div_inside_update_active_tasks" style="width:$width" >		
		<div id="div_inside_update_active_tasks_button_bar" style="width:$width">	
		<table id="table_inside_update_active_tasks" style="width:$width">
	<th></th>
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
					
					{{ Form::hidden('key_field_value'			,$key_field_value) }}
					{{ Form::hidden('report_key'				,$report_key) }}
					{{ Form::hidden('model_table'				,$model_table) }}
					{{ Form::submit('add new record', array('class'=>'mycart-btn-row2')) }}
					{{ Form::close() }}
				</td>
				</tr>
			</tbody>
			</table>		</td></tr>

		<?php 
		/*
			$rowcount = -1;
			$save_shift_id = "";
			$classradio = "class=\'bottom_buttons\'";	
		*/		
		?>    
	
		
			<!-- 			
			// *********
			// read loop
			// *********
			 -->
			
				<?php 
					$rowcount++;
					//print_r($record);exit("exit 73");
					//print_r($record->shift_id);exit("exit 73");
					
					?>
								@include($field_names_row_file_name)

			@foreach($all_records as  $record)
			
				<?php 
				//echo('still here');
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
		
					@include($browse_snippet_file_name)
					
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
						
						{{ Form::close() }}
					</td>
				</tr>
			@endforeach

		
		
			</table>
	</div>   <!-- end center_table_div -->	
	<script>
//write document.getElementById("div_inside_update_active_tasks").width = "2000px";
if (document.getElementById("table_inside_update_active_tasks").style.width > document.getElementById("div_inside_update_active_tasks").style.width) {
	
	document.getElementById("table_inside_update_active_tasks ").style.background_color = "#FF8C00";
	document.getElementById("table_inside_update_active_tasks ").style.width = "3000px";
}

</script>
	
	</div> <!-- end admin -->

	
@stop
</body>
