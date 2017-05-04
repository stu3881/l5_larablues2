@extends('layouts.main')
@section('promo')

<section id="promo">   
	browseEdit  
	<div id="promo-details"> 

		{{ HTML::image('/img/AlfaHiRes373x177.jpg', '69 myalfa',array('height'=>'72px'))}} 


		</div> <!-- end promo-details -->
</section><!-- promo -->
@stop


@section('content')
		BrowseEdit Defined Reports

<?php
	//var_dump($miscThings[0]);
	//exit("browseEdit.blade 17 ");
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
	
	{{ Form::open(array('url'=>'admin/miscThings','method'=>'POST')) }}

	{{-- Form::open(array('url'=>'admin/'.$node_name, 'method'=>'GET')) --}}
	{{ Form::hidden('key_field_name'						,$key_field_name) }}
	{{ Form::hidden('model_table'							,$model_table) }}
	{{ Form::hidden('node_name'								,$node_name) }}
	{{ Form::hidden('record_type'							,'report_definition') }}
	{{ Form::hidden('coming_from'							,'edit1_define_new_report') }}
	{{ Form::hidden('encoded_business_rules'				,$encoded_business_rules) }}
	
	<div id="update_active_tasks" ><br>
	
                      	updating   {{$model_table}} table
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
				   		<a href="{{ URL::route($node_name.'.indexReports', $parameters = array('id'=>$report_key,
			   			'reportDefinitionKey'=>$report_key
			   			)) }}" class="btn mycart-btn-row2">reports list
			   			</a>
					</td>
				<td class="table_no_lines">
			   		<a href="{{ URL::route('miscThings'.'.create_w_report_id', $parameters = array(
				   		'report_definition_key'=>$report_definition_key)
				   		) }}" class="btn mycart-btn-row2">
						Initialize_New_Report
				 	</a>

				</td>


				<td class="table_no_lines">
					<a href="{{ URL::route('Main.getIndex', $parameters = array('method'=>'GET')) }}" class="btn mycart-btn-row2">Main menu</a>
				</td>

				</tr>
			</tbody>
			</table>	
			{{ Form::close() }}
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
					
					?>
			@include($field_names_row_file_name)

			@foreach($all_records as  $record)
				<?php 
				//echo('still here');
				$rowcount++;
				//$record = (array) $record;
				$key = $key_field_name;
				$submit_button_name = "key_field_name" . " edit";


				?>
				<tr >
					<td class='border_left'>
						{{ Form::open(array('url'=>'admin/'.$node_name.'/edit', 'method'=>'GET')) }}
						{{ Form::label('', $rowcount) }} 
					</td>
		
					@include($browse_snippet_file_name)
					
	

			<!--
				the buttons at the end of each line
			-->
					<td>
						<!-- modifiable fields -->
		  		        <a href="{{ URL::route($node_name.'.editUpdate', $parameters = 
		  		        array(
		  		        'id'=>$record->id,
		  		        'what_we_are_doing'=>'edit2_default_edit',
		  		        'coming_from'=> 'browseEdit',
		  		        'report_definition_key'=>$report_key)
		  		        ) }}" class="btn mycart-btn-row2">
		  		        
		  		        editUpdate

		  		        </a>
					</td>


					<td >
						{{ Form::open(array('url'=>'admin/'.$node_name.'/edit', 'method'=>'GET')) }}
						{{ Form::hidden('key_field_name'			,$key_field_name) }}
						
						{{ Form::hidden('model_table'				,$model_table) }}
						{{ Form::hidden('record_table_name'			,$record_table_name) }}
						{{ Form::hidden('node_name'					,$node_name) }}
						
						{{ Form::hidden('report_key'				,$report_key) }}
						
						
						{{ Form::submit('klone_edit') }}
						{{ Form::close() }}
						</td>
					<td >
						{{ Form::open(array('url'=>'admin/'.$node_name.'/destroy', 'method'=>'POST')) }}
						{{ Form::hidden('key_field_name',$key_field_name) }}
						{{ Form::hidden('report_key',$report_key) }}
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
