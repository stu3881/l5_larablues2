@extends('layouts.main')
@section('promo')

<section id="promo">   
	mainlineActivateReporting
	<div id="promo-details"> 
		{{ HTML::image('/img/Alfa120pct.JPG', '69 myalfa',array('height'=>'160px'))}} 
	</div> <!-- end promo-details -->
</section><!-- promo -->
@stop


@section('content')
		Activate/Deactivate table reporting

<?php
	//var_dump($all_records);
	//var_dump($report_definition_key);
	//exit("indexReports.blade 17 ");

	$what_we_are_doing = 'what_we_are_doing';
	$coming_from = 'edit1';

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
	$i =  1;
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
	
	{{ Form::open(array('url'=>'admin/'.'ode_name'.'/add'	,'method'=>'GET')) }}
	
	
	<p>		
	<div id="div_inside_update_active_tasks" style="width:$width" >		
		<div id="div_inside_update_active_tasks_button_bar" style="width:$width">	
		<table id="table_inside_update_active_tasks" style="width:$width">
	<th></th>
		<tr class="table_no_lines">
		<td colspan={{$browse_select_field_count}} >	
			<table class="table_no_lines">
				<tr class="table_no_lines">
				<td>	
			   		<a href="{{ URL::route('miscThings'.'.create_w_report_id', $parameters = array(
				   		'report_definition_key'=>'report_definition_key')
				   		) }}" class="btn mycart-btn-row2">
						Initialize_New_Report
				 	</a>

				</td>
				<td class="table_no_lines">
					<a href="{{ URL::route('Main.getIndex', $parameters = array('method'=>'GET')) }}" class="btn mycart-btn-row2">Main menu</a>
				</td>
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
		@foreach($arr1 as $table=>$value)
			 
				<?php 
				//var_dump($arr1);//exit("edit1.blade xx");
				//var_dump($arr1);exit("edit1.blade xx");
				?>
				<tr >
				<td class='border_left'>
					{{ Form::open(array('url'=>'admin/'.'node_name'.'/reportDefEdits', 'method'=>'GET')) }}
					{{-- Form::label('', '--') --}} 
				</td>

				<?php echo($myStrings['tdBegin']);?>
					{{ $table }}
				<?php echo($myStrings['tdEnd']);?>
				
				<?php echo($myStrings['tdBegin']);?>
				<?php echo($myStrings['linkBegin']);?>
					{{ $arr1[$table]['aord'][0] }}
				<?php echo($myStrings['linkEnd']);?>
				<?php echo($myStrings['tdEnd']);?>
				
				<?php echo($myStrings['tdBegin']);?>
	  		        <a href=
	  		        "{{-- URL::route($node_name.'.browseEdit', $parameters = 
	  		        array(
	  		        'id'=>$record->id, 
	  		        'what_we_are_doing'=>$what_we_are_doing,
	  		        'coming_from'=> $coming_from
	  		        )) --}}" 
	  		        class="btn btn-warning"> 
	  		        browseEdit</a>
				<?php echo($myStrings['tdEnd']);?>
				

			</tr>
				
		@endforeach
	
		
			</table>
	{{ Form::close() }}
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
