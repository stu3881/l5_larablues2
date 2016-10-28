@extends('layouts.main')

@section('content')
<?php 
//$generated_snippets_array is passed in
//$coming_from is passed in by getAdd
//echo ('<br>add<br>');print_r(Input::all());//$table_name.$report_key.$business_rules);//
//echo ('$lookups <br>');print_r($lookups);exit('xit add 16');
//exit('xit add 16');

switch ($coming_from) {
	
	case "add.blade":
		echo($coming_from);exit('xit add validator_error');	
		$coming_from 						= Input::get('coming_from');
		$table_name 						= Input::get('table_name');
		$encoded_lookups 					= Input::get('encoded_lookups');
		$encoded_field_name_array 			= Input::get('encoded_field_name_array');
		$encoded_record 					= Input::get('encoded_record');
		$encoded_old_name_new_name_array 	= Input::get('encoded_old_name_new_name_array');
		$encoded_generated_snippets_array 	= Input::get('encoded_generated_snippets_array');
		
		echo($coming_from);exit('xit add validator_error');	
		break;
	case "edit1_define_new_report":
		//$table_name = Input::get('table_name');
		echo($coming_from);exit('xit add 16validator_error');	
		break;
	case "edit2 add new record":
	case "edit2":
		//->with('coming_from',$coming_from)
		//->with('table_name',$this->model_table)
		$coming_from 						= $coming_from;
		$table_name 						= $table_name;
		$encoded_lookups 					= $encoded_lookups;
		$encoded_field_name_array 			= $encoded_field_name_array;
		$encoded_record 					= $encoded_record;
		$encoded_old_name_new_name_array 	= $encoded_old_name_new_name_array;
		$encoded_generated_snippets_array 	= $encoded_generated_snippets_array;
		
		$lookups 					= json_decode($encoded_lookups,1);
		$field_name_array 			= json_decode($encoded_field_name_array,1);
		$record 					= json_decode($encoded_record,1);
		$old_name_new_name_array 	= json_decode($encoded_old_name_new_name_array,1);
		$generated_snippets_array 	= json_decode($encoded_generated_snippets_array,1);
		
		//
		
		
//print_r($lookups);exit('xit 15');
		/*
		print_r($lookups);
		echo("<br>***a**<br>*****<br>");
		print_r($encoded_lookups);
		echo("<br>***b**<br>*****<br>");print_r($field_name_array);
		echo("<br>***c**<br>*****<br>");print_r($coming_from);
		echo("<br>***d**<br>*****<br>");print_r($record);
		echo("<br>***e**<br>*****<br>");print_r($encoded_old_name_new_name_array);
		echo("<br>***f**<br>*****<br>");print_r($table_name);
		echo("<br>***g**<br>*****<br>");print_r($generated_snippets_array);
		if (isset($message)){
			echo("<br>***h**<br>*****<br>");print_r($message);
		}
		exit('xit add 21a');
		*/
		//echo($coming_from);exit('xit add 16validator_error');	
		//$business_rules = json_decode($generated_snippets_array['business_rules'],true);
		//$table_name = $generated_snippets_array['table_name'];
		//echo ('coming from edit2');print_r($table_name);exit('xit add 27');
		break;

	case "business_rules":
	echo($coming_from);exit('xit add 30validator_error');	
		//$business_rules = json_decode($generated_snippets_array['business_rules'],true);
		//$table_name = $generated_snippets_array['table_name'];
		break;
	default:
	echo($coming_from);exit('xit add 35validator_error');	
		//$table_name = $generated_snippets_array['table_name'];
		break;
}

//$field_name_array = json_decode(Input::get('encoded_field_name_array'),true);
//echo('77'.$table_name.$coming_from);exit('xit add 77');

//echo($table_name.$coming_from);exit('xit add 56');
	//$table_name = Input::get('table_name');	
	$report_key = Input::get('report_key');	
	//print_r(Input::old('table_name'));
	$business_rules = Input::get('business_rules');	
	//echo ('***********************************');
	//echo ('**hhp*$Input::all()***<br>');print_r(Input::all());//$table_name.$report_key.$business_rules);//exit('xit add 16');	
	//echo ('all three '.$table_name.$report_key.$business_rules);
	//exit('xit add 16');
//}else {
	//echo ('$table_name passed in '.$table_name.$report_key.$business_rules);exit('xit add 18');
	//echo ('<br>#######################<br>');print_r($coming_from);echo ('<br>***$Input::all()***<br>');print_r(Input::all());echo ('<br>***$generated_snippets_array***<br>');print_r($generated_snippets_array);
//}


//echo ('add.blade$coming_from');print_r($coming_from);exit('xit add 17');
//echo ('add.blade');print_r(Input::all());exit('xit add 17');
//echo ('add.blade $generated_snippets_array');print_r($coming_from);print_r($generated_snippets_array);exit('xit add 17');
	echo($table_name.$coming_from);//exit('xit add 74');
switch ($coming_from) {
	case "edit1_define_new_report":
		//$table_name = Input::get('table_name');
		break;

	
	case "edit2 add new record":
	case "edit2":
		//$business_rules = json_decode($generated_snippets_array['business_rules'],true);
		//$table_name = $generated_snippets_array['table_name'];
		//echo ('coming from edit2');print_r($table_name);exit('xit add 27');
		break;
		
	case "business_rules":
		//$business_rules = json_decode($generated_snippets_array['business_rules'],true);
		//$table_name = $generated_snippets_array['table_name'];
		break;		
	default:
		//$table_name = $generated_snippets_array['table_name'];
		break;
}
//$business_rules = json_decode($generated_snippets_array['business_rules'],true);
//echo ('$business_rules');print_r($business_rules);exit('xit add 5');



	//echo ('add.blade');print_r(Input::all());exit('xit add 5');
	//echo ('$generated_snippets_array');print_r($generated_snippets_array);exit('xit add 5');
		//echo ('add.blade');print_r(Input::all());exit('xit add 5');

	//print_r($active_statuses_array);
//echo($table_name.$coming_from."error...".$errors.$report_key);exit('xit add 106');

if ($coming_from != 'edit2 add new record' ){
	echo('12 '.$coming_from);
	exit('xit add 21a');

}
//exit('xit add 136');
?>

<div id="admin" style="width:650px;height:99%">
	@if($errors->has())	
	<div id="form-errors">
		<p>The following errors have occurred:</p>
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error}}</li>
			@endforeach
		</ul>
	</div> 
	<!-- end form-errors -->			
	@endif
	</p>
	<div id="update_active_tasks" style="width:99%"><br>
		Adding new record to {{ $table_name }}
		<p>
		<p>		
		<div id="div_inside_update_active_tasks" >	
		{{ Form::open(array('url'=>'admin/miscThings/create', 'method'=>'POST','class'=>'table_inside_update_active_tasks')) }}
		{{ Form::hidden('coming_from'					,'add.blade') }}
		{{ Form::hidden('report_key'					,Input::get('report_key')) }}
		{{ Form::hidden('table_name'					,$table_name) }}
		{{ Form::hidden('encoded_old_name_new_name_array',$encoded_old_name_new_name_array) }}
		{{ Form::hidden('encoded_lookups'				,$encoded_lookups) }}
		{{ Form::hidden('encoded_field_name_array'		,$encoded_field_name_array) }}
		{{ Form::hidden('encoded_generated_snippets_array',$encoded_generated_snippets_array) }}
		
	
		
		
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
							{{ Form::open(array('url'=>'admin/main', 'method'=>'GET')) }}
							{{ Form::submit('Main menu', array('class'=>'cart-btn')) }}
							{{ Form::close() }}
						</td><td>	
							
							{{ Form::open(array('url'=>'admin/'.$table_name, 'method'=>'GET')) }}
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
						@include($table_name.'/hardcoded_edit1_add_save_snippet')
					}
					@else{								
						@include($table_name.'/'.$report_key.'_modifiable_add_save_add_snippet') 
					}@endif										
			
				</table>
				
		</div>   <!-- end div_inside_update_active_tasks -->				
	</div>   <!-- end update_active_tasks -->	
</div> <!-- end admin -->
	
	
@stop
