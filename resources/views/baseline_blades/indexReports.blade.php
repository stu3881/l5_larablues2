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
	//var_dump($miscThings[0]);//exit("edit1.blade 17 ");

$rowcount = -1;
// *******

	$i = count($miscThings) + 1;

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
	{{ Form::hidden('key_field_name'						,$miscThings[0]->key_field_name) }}
	{{-- Form::hidden('encoded_field_name_array'				,$encoded_field_name_array) --}}
	{{ Form::hidden('model_table'							,$miscThings[0]->model_table) }}
	{{ Form::hidden('node_name'								,$node_name) }}
	{{-- Form::hidden('snippet_table'							,$snippet_table) --}}
	{{ Form::hidden('record_type'							,'report_definition') }}
	{{ Form::hidden('coming_from'							,'edit1_define_new_report') }}
	
	<div id="update_active_tasks" ><br>
	
                      	updating   {{$miscThings[0]->model_table}} table
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
					
					{{ Form::submit('main menu', array('class'=>'cart-btn')) }}
					{{ Form::close() }}
				</td><td>	
					{{ Form::open(array('url'=>'admin/'.$node_name, 'method'=>'GET')) }}
					{{ Form::hidden('model_table',$miscThings[0]->model_table) }}
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
		@foreach($miscThings as $record)
			 
				<?php 
				//var_dump($record);exit("edit1.blade xx");
				?>
				<tr >
				<td class='border_left'>
					{{ Form::open(array('url'=>'admin/'.$node_name.'/edit41', 'method'=>'PUT')) }}
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
					{{ Form::open(array('url'=>'admin/'.$node_name.'/'.$record->id.'/browseEdit', 'method'=>'GET')) }}

					{{ Form::submit('browse_edit') }}

					{{ Form::hidden('key_field_name'		,$record->key_field_name) }}
					{{ Form::hidden('data_key'				,$record->id) }}
					{{ Form::hidden('report_key'			,$record->$snippet_table_key_field_name) }}
					{{ Form::hidden('model_table'			,$record->model_table) }}
					{{ Form::hidden('node_name'				,$node_name) }}
					{{ Form::hidden('report_name'			,$record->report_name) }}
					{{ Form::hidden('coming_from'			,'edit1_browse_button') }}
					{{ Form::hidden('what_we_are_doing'		,'browseEdit_build_default_browse') }}		

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
