@extends('layouts.main')

@section('content')
<?php 
// *******************************
// these fields are passed in when made in getAdd
//$coming_from 						= $coming_from;
//$report_key 						= $report_key;
//$table_name 						= $table_name;
//$snippet_table 					= $snippet_table;
//$snippet_table_key_field_name		= $snippet_table_key_field_name);

//$encoded_lookups 					= $encoded_lookups;
//$encoded_field_name_array 		= $encoded_field_name_array;
//$encoded_record 					= $encoded_record;
//$encoded_old_name_new_name_array 	= $encoded_old_name_new_name_array;
//$encoded_generated_snippets_array = $encoded_generated_snippets_array;
// *******************************
//echo('<br><br>in add.blade<br>');
//print_r(Input::all());//exit('xit add 17');
if (isset($generated_files_folder))
{
	//echo($generated_files_folder .'b');
}else{
	$generated_files_folder 			= Input::get('generated_files_folder');
	//print_r($generated_files_folder);;echo('b');
	//exit('xit add 17');	
}
echo($generated_files_folder .'baseline_blades/add.blade.php');

//exit('xit add 17');
//$snippet_table = $snippet_table;

if (array_key_exists('coming_from',Input::all())){
	$coming_from 					= Input::get('coming_from');
	$snippet_table_key_field_name 	= Input::get('snippet_table_key_field_name');
	//$generated_files_folder 		= Input::get('generated_files_folder');

	
}
else{
	$coming_from = $coming_from;
}

if (array_key_exists('report_key',Input::all())){
	$report_key = Input::get('report_key');
}
else{
	if (isset($report_key)){
		$report_key = $report_key;
	}
	else {
		$report_key = "";
	}
}

switch ($coming_from) {
	case "edit1_define_new_report":
		//$table_name = Input::get('table_name');
		//print_r(Input::all());
		$title = "you're defining a new report for table:".$table_name;
		$table_name 				= $table_name;
		$snippet_table 				= Input::get('snippet_table');
		//echo($coming_from);exit('xit 62');
		break;
	case "edit2_add_new_record":
	case "edit2":
		//echo ('<br>edit2_add_new_record<br>'.$coming_from.$table_name );
		$generated_snippets_array 	= json_decode($encoded_generated_snippets_array,1);
		$title = "you're adding a new record to report: ".$generated_snippets_array['report_name'];
		$lookups 					= json_decode($encoded_lookups,1);
		$field_name_array 			= json_decode($encoded_field_name_array,1);
		$record 					= json_decode($encoded_record,1);
		$old_name_new_name_array 	= json_decode($encoded_old_name_new_name_array,1);
		$report_key 				= $generated_snippets_array['id'];
		$table_name 				= $table_name;
		$snippet_table 				= Input::get('snippet_table');
		//exit('xit add 56');
		break;
 	case "business_rules":
		echo($coming_from);exit('xit add 30validator_error');
		//$business_rules = json_decode($generated_snippets_array['business_rules'],true);
		//$table_name = $generated_snippets_array['table_name'];
		break;
	default:
		echo($coming_from);exit('xit add 75validator_error');
		//$table_name = $generated_snippets_array['table_name'];
		break;
}
?>

<div id="admin" style="width:650px;height:99%">
	@if($errors->has())	
		<div id="form-errors">
			<p>The following errors must be corrected:</p>
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ltrim($error)}}</li>
				@endforeach
			</ul>
		</div> 
		<!-- end form-errors -->			
	@endif
	</p>
	<div id="update_active_tasks" style="width:99%"><br>
		{{ $title }}
		<p>
		<p>		
		<div id="div_inside_update_active_tasks" >	
		{{ Form::open(array('url'=>'admin/'.$node_name.'/create', 'method'=>'POST','class'=>'table_inside_update_active_tasks')) }}
		{{ Form::hidden('snippet_table'						,Input::get('snippet_table')) }}
		{{ Form::hidden('snippet_table_key_field_name'		,$snippet_table_key_field_name) }}
		{{ Form::hidden('report_key'						,$report_key) }}
		{{ Form::hidden('coming_from'						,$coming_from) }}
		{{ Form::hidden('table_name'						,$table_name) }}
		{{ Form::hidden('node_name'							,$node_name) }}
		
		@if ($coming_from == 'edit2_add_new_record'){
			{{ Form::hidden('encoded_lookups'					,$encoded_lookups) }}
			{{ Form::hidden('encoded_field_name_array'			,$encoded_field_name_array) }}
			{{ Form::hidden('encoded_old_name_new_name_array'	,$encoded_old_name_new_name_array) }}
			{{ Form::hidden('encoded_generated_snippets_array'	,$encoded_generated_snippets_array) }}
		}@endif										
 {{ method_field('PUT') }}
		{{$coming_from.'atmatm'}}
		<table id="outer_tbl_0" class="table_inside_update_active_tasks">
				<th></th>
				<tr class="table_no_lines">
				<td colspan="2">	
					<table id="inner_tbl_0_0" class="table_no_lines">
						<tr class="table_no_lines">
						<td class="table_no_lines">
							{{ Form::submit('Add this record') }}
							{{ Form::close() }}
						</td><td>	

							{{ Form::open(array('url'=>'admin/'.$node_name.'/createmt', 'method'=>'post','class'=>'table_inside_update_active_tasks')) }}
							{{ Form::hidden('snippet_table'	,Input::get('snippet_table')) }}
							{{ method_field('post') }}
							{{ Form::hidden('snippet_table_key_field_name'		,$snippet_table_key_field_name) }}
							{{ Form::hidden('report_key'						,$report_key) }}
							{{ Form::hidden('coming_from'						,$coming_from) }}
							{{ Form::hidden('table_name'						,$table_name) }}
							{{ Form::hidden('node_name'							,$node_name) }}
							{{ Form::submit('AddTsrT this record') }}
							{{ Form::close() }}


							</td><td>	
							{{ Form::open(array('url'=>'admin/main', 'method'=>'GET')) }}
							{{ Form::submit('Main menu', array('class'=>'cart-btn')) }}
							{{ Form::close() }}
						</td><td>	
							{{ Form::open(array('url'=>'admin/'.$node_name, 'method'=>'GET')) }}
							{{ Form::hidden('model_table',$table_name) }}
							{{ Form::hidden('snippet_table',Input::get('snippet_table')) }}
							{{ Form::submit($table_name.' menu', array('class'=>'cart-btn')) }}
							{{ Form::close() }}
						</td></tr>
					</table>
				</td>
				</tr>
		
				<?php 
					$rowcount = -1;
					$save_shift = "";
					$classradio = "class=\'bottom_buttons\'";
					$new_name = "";
					//echo ('***1069 $coming_from***<br>');print_r($coming_from);echo ('***$Input::all()***<br>');print_r(Input::all());echo ('***$generated_snippets_array***<br>');print_r($generated_snippets_array);
				?>	
			 
				
					@if ($coming_from == 'edit1_define_new_report'){
						@include($node_name.'/hardcoded_edit1_add_save_snippet')
					}
					@else{								
						@include("../".$node_name.'/'.$generated_files_folder.'/'.$report_key.'_modifiable_add_save_add_snippet') 
					}@endif										
			
				</table>
				
		</div>   <!-- end div_inside_update_active_tasks -->				
	</div>   <!-- end update_active_tasks -->	
</div> <!-- end admin -->
	
	
@stop
