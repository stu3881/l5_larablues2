@extends('layouts.main')
@section('promo')

<section id="promo">   
	indexReports  
	<div id="promo-details"> 
		{{ HTML::image('/img/Alfa120pct.JPG', '69 myalfa',array('height'=>'160px'))}} 
	</div> <!-- end promo-details -->
</section><!-- promo -->
@stop


@section('content')
		Browse Select Defined Reports

<?php
	//var_dump($all_records[0]);exit("indexReports.blade 17 ");
	//var_dump($parameters);exit("indexReports.blade 17 ");
	//var_dump($report_definition_id);
	//exit("indexReports.blade 17 ");
	$request = "";
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
	
	{!! Form::model('MiscThing',['method' => 'PUT','route'=>[$node_name.'.update',$id,$what_we_are_doing,$coming_from]]) !!}
		{{ Form::hidden('id'						,15) }}
		{{ Form::hidden('coming_from'				,'indexReports') }}
		{{ Form::hidden('what_we_are_doing'			,'initializeNewReport') }}
	
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
			   		<a href="{{ URL::route($node_name.'.create_w_report_id', $parameters = array(
				   		'report_definition_key'=>$report_definition_id)
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
		@foreach($all_records as $record)
			 
				<?php 
				//echo $node_name;var_dump($record->attributes);//exit("edit1.blade xx");
				?>
				<tr >




				<td class='border_left'>
					{{ Form::open(array('url'=>'admin/'.$node_name.'/reportDefEdits', 'method'=>'GET')) }}
					{{ Form::label('', $rowcount) }} 
				</td>

					@include($node_name.'/'.'genned_edit1')
				
	<!--	
	the buttons at the end of the line 
	-->

  		        <td>
	  		        <a href="{{ URL::route($node_name.'.reportDefMenuEdit', 
	  		        $parameters = array(
	  		        'id'=>$record->id,
	  		        'what_we_are_doing'=>$what_we_are_doing,
	  		        'coming_from'=> $coming_from
	  		        )) }}" class="btn btn-warning">
	  		        {{$record->id}} edita
	  		        </a>
					{{ Form::close() }}
				</td>
<td>
    <form class="delete" action="{{ route($snippet_node_name.'.destroy',$record->id) }}" method="GET">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="what_we_are_doing" value="delete_report" />
        <input type="hidden" name="coming_from" value="indexReports" />
        <input type="hidden" name="coming_from_node" value={{$node_name}} />
        <input type="hidden" name="report_definition_id" value={{$report_definition_id}} />
        <input type="submit" value="delete Report">
    </form>
</td>

				<td >
	  		        <a href=
	  		        "{{ URL::route($node_name.'.browseEdit', $parameters = 
	  		        array(
	  		        'id'=>$record->id, 
	  		        'what_we_are_doing'=>$what_we_are_doing,
	  		        'coming_from'=> $coming_from
	  		        )) }}" 
	  		        class="btn btn-warning"> 
	  		        browseEdit</a>
				</td>


			</tr>
				<?php 
				//echo $node_name;var_dump($record);//exit("edit1.blade xx");
				?>
				
		@endforeach
		
		
			</table>


<script>
    $(".delete").on("submit", function(){
        return confirm("Do you want to delete this item?");
    });
</script>

<script>
function confirmDelete() {
var result = confirm('Are you sure you want to delete?');

if (result) {
        return true;
    } else {
        return false;
    }
}</script>	

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
