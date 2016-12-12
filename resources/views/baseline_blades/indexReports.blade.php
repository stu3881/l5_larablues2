@extends('layouts.main')
@section('promo')

<section id="promo">     
	<div id="promo-details"> 
		{{ HTML::image('/img/Alfa120pct.JPG', '69 myalfa',array('height'=>'172px'))}} 


		</div> <!-- end promo-details -->
</section><!-- promo -->
@stop


@section('content')
		Browse Select Defined Reports

<?php
	//var_dump($all_records);exit("edit1.blade 17 ");

$rowcount = -1;
// *******
//		->with('all_records',$db_result)
//		->with('report_table',$this->snippet_table) // miscThings for ALL tables
//		->with('generated_snippets_array',$this->generated_snippets_array)
//		->with('field_name_array',$arrx) // just the names for the report name browse
//		->with('key_field_name',$this->key_field_name);
// *******

//			->with('all_records'				,$db_result)
//			->with('node_name'					,$this->node_name)
//			->with('snippet_table_key_field_name',$this->snippet_table_key_field_name)
//			->with('snippet_table'				,$this->snippet_table)

/*
	$snippet_table 	= $snippet_table; // passed in
	$all_records[0]->model_table 	= $all_records[0]->model_table; // passed in
	$node_name 		= $node_name; // passed in
	$snippet_table_key_field_name = $snippet_table_key_field_name;
	$all_records[0]->key_field_name = $snippet_table_key_field_name;
	$generated_snippets_array = $generated_snippets_array;  // passed in
	$generated_files_folder = $generated_files_folder;  // passed in
*/	
	//echo("inside edit1 blade");
	//var_dump($all_records[0]);
	//echo("*node_name*".$node_name);
	//print_r($snippet_table_key_field_name);
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
			<table class="table_no_lines">
				<tr class="table_no_lines">
				<td class="table_no_lines">
					{{ Form::submit('Define_New_Report') }}
					{{ Form::close() }}
				</td><td>	
					{{ Form::open(array('url'=>'admin/main', 'method'=>'GET')) }}
					{{ Form::hidden('model_table',$model_table) }}
					{{ Form::hidden('id',$all_records[0]->id) }}

					{{ Form::hidden('node_name',$node_name) }}
					{{ Form::submit('main menu', array('class'=>'cart-btn')) }}
					{{ Form::close() }}
				</td><td>	
					{{ Form::open(array('url'=>'admin/'.$node_name, 'method'=>'GET')) }}
					{{ Form::hidden('model_table',$all_records[0]->model_table) }}
					{{ Form::hidden('node_name',$node_name) }}
					{{-- Form::hidden('snippet_table',$snippet_table) --}}
					{{ Form::submit($node_name.' menu', array('class'=>'cart-btn')) }}
					{{ Form::close() }}
				</td></tr>
			</table>
		</td></tr>

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
		@foreach($all_records as $record)
			 
				<?php 
				//var_dump($record);exit("edit1.blade xx");
				?>
				<tr >
				<td class='border_left'>
					{{ Form::open(array('url'=>'admin/'.$node_name.'/reportDefEdits', 'method'=>'GET')) }}
					{{ Form::label('', $rowcount) }} 
				</td>

					@include($node_name.'/'.'genned_edit1')
				
				
				
				<!--	the buttons at the end of the line -->
				<td >
					{{ Form::hidden('coming_from','edit1') }}
					{{ Form::hidden('report_key',$record->$snippet_table_key_field_name) }}
					{{ Form::hidden('node_name',$node_name) }}
					{{ Form::hidden('what_we_are_doing'		,'displaying_advanced_edits_screen') }}			

					{{ Form::submit($record->$snippet_table_key_field_name.' edit') }}
					{{ Form::close() }}
				</td>
				<td >
					{{ Form::open(array('url'=>'admin/'.$node_name.'/destroy', 'method'=>'POST')) }}
					{{ Form::hidden('coming_from','edit1') }}
					{{ Form::hidden('logical_button_name'	,'deleting a record') }}
					{{ Form::hidden('what_we_are_doing'		,'deleting_record') }}			

					{{-- Form::hidden('model_table',$record->model_table) --}}
					{{ Form::hidden('node_name',$node_name) }}
					{{-- Form::hidden('snippet_table',$snippet_table) --}}
					{{-- Form::hidden('key_field_name',$record->key_field_name) --}}
					{{ Form::submit('delete') }}
					{{ Form::close() }}
				</td>		
				<td >
					{{ Form::open(array('url'=>'admin/'.$node_name.'/edit2', 'method'=>'GET')) }}

					{{ Form::submit('browse_edit') }}

					{{ Form::hidden('key_field_name'		,$record->key_field_name) }}
					{{ Form::hidden('data_key'				,$record->id) }}
					{{ Form::hidden('report_key'			,$record->$snippet_table_key_field_name) }}
					{{ Form::hidden('model_table'			,$record->model_table) }}
					{{ Form::hidden('node_name'				,$node_name) }}
					{{ Form::hidden('report_name'			,$record->report_name) }}
					{{ Form::hidden('coming_from'			,'edit1_browse_button') }}
					{{ Form::hidden('what_we_are_doing'		,'edit2_build_default_browse') }}		

					{{ Form::hidden('logical_button_name'	,'executing_and_displaying_a_browse') }}
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
