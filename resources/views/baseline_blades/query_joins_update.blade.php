@extends('layouts.main')

@section('content')

@if (!isset($coming_from))
	{{-- $coming_from = Input::get('coming_from') --}}
@endif
<div id="admin" style="width:750px">
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif 
	</p>
<?php 


//var_dump($field_name_array);
//var_dump($var_dump($field_name_array););var_dump($r_o_array[1]);var_dump($second_lookup_array[$r_o_array[1]]);

//var_dump($record2);
//var_dump($first_lookup_array);var_dump($second_lookup_array);
//var_dump($field_name_array);var_dump($r_o_array);var_dump($value_array);
//var_dump($second_lookup_array);var_dump($field_name_array);
//var_dump($second_lookup_array);
//echo('field_name_array');var_dump($field_name_array);
//var_dump($value_array);
//$generated_files_folder
//->with('record'										,$record_array)
//->with('record2'									,$record_obj)

//exit("ppv_update exit 38"); 
?>

<!--  
// *****
// first row of buttons
// *****
-->

	<div id="update_active_tasks" >{{$what_we_are_doing}}
	<br>
		
		{{-- $record2[0]->model_table --}}
		{!! Form::model('MiscThing',[
		'method' => 'PUT',
		'route'=>[$node_name.'.update',$miscThing[0]->id,$what_we_are_doing,$coming_from]]) !!}

		{{ Form::hidden('coming_from'				,'ppv_update') }}

		@if($what_we_are_doing == "ppv_define_query")	
			{{ Form::hidden('what_we_are_doing'	, "ppv_define_query") }}
			{{ Form::hidden('query_field_name_array', "") }}
			{{ Form::hidden('query_r_o_array'		, "") }}
			{{ Form::hidden('query_value_array'		, "") }}
		@endif						
		@if($what_we_are_doing == "ppv_define_business_rules")	
			{{ Form::hidden('what_we_are_doing'	, "ppv_define_business_rules") }}
			{{ Form::hidden('business_rules_field_name_array'	, "") }}
			{{ Form::hidden('business_rules_r_o_array'			, "") }}
			{{ Form::hidden('business_rules_value_array'		, "") }}
			{{ Form::hidden('business_rules'					, "") }}
			{{ Form::hidden('just_the_names_array', $just_the_names_array) }}
		@endif						


		<p>		
		<div id="div_inside_update_active_tasks" >	<!--div_inside_update_active_tasks -->
		
			<div id="div_inside_update_active_tasks_button_bar" >	<!-- div_inside_update_active_tasks_button_bar -->
				<table id="outer_tbl_0" class="table_inside_update_active_tasks">
				<tr class="table_no_lines">
				<td colspan="4">	
				<table id="inner_tbl_0_0" class="table_no_lines">
					<tr class="table_no_lines">
					<td class="table_no_lines">
						{{ Form::submit('Update Record') }}
						{{ Form::close() }}
					</td>
			
					<td class="table_no_lines">
				   		<a href="{{ URL::route($miscThing[0]->node_name.'.indexReports', 
					   		$parameters = array(
					   		'id'=>$miscThing[0]->id,
			   				'reportDefinitionKey'=>$miscThing[0]->id
			   				)
		   				) }}" class="btn mycart-btn-row2">Reports menu</a>
					</td>
	
					<td class="table_no_lines">
						<a href="{{ URL::route('Main.getIndex', $parameters = array('method'=>'GET')) }}" class="btn mycart-btn-row2">Main menu</a>
					</td>
							</div>			
							</tr>
						</table>
					</td>
				</tr>
				<?php
					echo($bladetest);
				?>
		@if($what_we_are_doing == "maintain_query_joins")	
			@include($node_name.'/'.'generated_files'.'/'.$id.'_snippet_string')

		@endif		
				
			</table>
				
		</div>   <!-- end div_inside_update_active_tasks -->				
	</div>   <!-- end update_active_tasks -->	
</div> <!-- end admin -->
	
	
@stop