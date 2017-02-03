@extends('layouts.main')
@section('promo')

<section id="promo">   
	editUpdate  
	<div id="promo-details"> 
		{{ HTML::image('/img/Alfa120pct.JPG', '69 myalfa',array('height'=>'172px'))}} 
	</div> <!-- end promo-details -->
</section><!-- promo -->
@stop

@section('content')


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
<!--  
// *****
// first row of buttons
// *****
-->
<?php 

	//var_dump(Input::all());var_dump($passed_to_view_array);
//exit("edit2new exit 16"); 	
	$node_name 							= $passed_to_view_array['report_definition']->node_name;
	$report_name 						= $passed_to_view_array['report_definition']->report_name;
	$snippet_name 						= $passed_to_view_array['snippet_name'];
	$encoded_input 						= $passed_to_view_array['encoded_input'];
	$encoded_report_definition 			= $passed_to_view_array['encoded_report_definition'];
	$encoded_modifiable_fields_array 	= $passed_to_view_array['encoded_modifiable_fields_array'];
	$snippet_string 					= $passed_to_view_array['snippet_string'];
	$data_array_name 					= $passed_to_view_array['record'];
	$lookups		 					= $passed_to_view_array['lookups_array'];
	$record 							= $passed_to_view_array['record'];
	//var_dump($record);
	//var_dump($data_array_name);var_dump($passed_to_view_array);
	//exit("edit2new exit 35");
	//$coming_from 				= Input::get('coming_from');
	//$generated_files_folder 	= 'generated_files';

/* 

*/

 
?>
<div id="admin" style="width:100%">

	
	</p>
	<div id="update_active_tasks" >Update Selected Record
	<br>
		
		{{ $passed_to_view_array['report_definition']->model_table }}

	
		{{ Form::open(array('url'=>'admin/'.$node_name.'/update', 'method'=>'PUT','class'=>'table_inside_update_active_tasks')) }}
		{{ Form::hidden('id'							,$passed_to_view_array['id']) }}
		{{ Form::hidden('wxyz'							,$passed_to_view_array['wxyz']) }}
		{{ Form::hidden('coming_from'						,$passed_to_view_array['coming_from']) }}
		{{ Form::hidden('report_definition_key'				,$passed_to_view_array['report_definition_key']) }}
		
		
		{{ Form::hidden('what_we_are_doing'					,'updating_data_record') }}

		<p>		
		<div id="div_inside_update_active_tasks" >	<!--div_inside_update_active_tasks -->
		
			<div id="div_inside_update_active_tasks_button_bar" >	<!-- div_inside_update_active_tasks_button_bar -->
				<table id="outer_tbl_0" class="table_inside_update_active_tasks">
				<tr class="table_no_lines">
				<td colspan="4">	
				<table id="inner_tbl_0_0" class="table_no_lines">
					<tr class="table_no_lines">

					<td class="table_no_lines">
						{{ Form::submit('Update ') }}
						{{ Form::close() }}
					</td>
			
		
					<td class="table_no_lines">
						{{ Form::open(array('url'=>'admin/'.$node_name, 'method'=>'GET')) }}
						{{ Form::submit('Reports menu') }}
						{{ Form::close() }}


					</td>
	
					<td class="table_no_lines">
						{{ Form::open(array('url'=>'admin/main', 'method'=>'GET')) }}
						{{ Form::submit('Main menu' ) }}
						{{ Form::close() }}
					</td>
		</div>			
						</tr>
						
<!--  
*****
// second row of buttons
// *****
--> 
						<?php 
							//echo ('<br>edit.blade 116<br>');print_r(Input::all());exit('exit edit.blade');
						?>
			@if($passed_to_view_array['coming_from'] == "edit1")	
				<tr class='table_no_lines'>

				<td>	
					<!-- modifiable fields -->
					{{ Form::open(array('url'=>'admin/'.$node_name.'/edit4'	,'method'=>'PUT')) }}
					{{ Form::hidden('edit4_option'						,'field_list_edit') }}
					{{ Form::hidden('button_name'						,'update_modifiable_fields') }}
					{{ Form::submit('define_modifiable_fields'			, array('class'=>'mycart-btn-row2')) }}
					{{ Form::close() }}
				</td>		
				<td>
				
				<!-- browse_select_array fields -->
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit4' , 'method'=>'PUT')) }}

				{{ Form::hidden('what_we_are_doing'						,'maintain_modifiable_fields') }}
				{{ Form::hidden('edit4_option'							,'field_list_select') }}
	

				{{ Form::hidden('node_name',$node_name) }}
				{{ Form::hidden('edit4_option','field_list_edit') }}
				{{ Form::hidden('button_name','update browse_select list') }}
				{{ Form::submit('define_browse_fields', array('class'=>'mycart-btn-row2')) }}
				{{ Form::close() }}
			</td>
			
			<td>
				<!-- advanced query fields 
					the other buttons go thru edit4 whereas this button tries to go straight to edit
				-->		
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit' , 'method'=>'GET')) }}
				
				{{ Form::hidden('coming_from','advanced_query') }}
				{{ Form::hidden('button_name','update advanced_query') }}
				{{ Form::submit('define_advanced_query', array('class'=>'mycart-btn-row2')) }}
				{{ Form::close() }}
				</td>
			<td>
				<!-- business rules fields 
					the other buttons go thru edit4 whereas this button tries to go straight to edit
				-->		
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit' , 'method'=>'GET')) }}
				{{ Form::hidden('report_name',$passed_to_view_array['report_definition']->report_name) }}
				{{-- Form::hidden('model_table',Input::get('model_table')) --}}
		
				{{ Form::hidden('coming_from','business_rules') }}
				{{ Form::hidden('button_name','update business_rules') }}
				{{ Form::submit('define_business_rules', array('class'=>'mycart-btn-row2')) }}
				{{ Form::close() }}
				</td>
				</tr>
											
						@endif
	
					</table>
				</td>
				</tr>
				
 <tr>
 {{ 'Record key: ' . $passed_to_view_array['id'] }}
 </tr>
<tr>
<td style="text-align:left">
{{ Form::label("record_type","record_type") }}
</td>
<td style="text-align:left">
{{ Form::text('record_type',$record['record_type']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("db_connection_name","db_connection_name") }}
</td>
<td style="text-align:left">
{{ Form::text('db_connection_name',$record['db_connection_name']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("field_name","field_name") }}
</td>
<td style='text-align:left'>
{{ Form::select('field_name',$lookups['field_name'] , $data_array_name['field_name']) }}
</td>
</tr>
<tr>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("report_name","report_name") }}
</td>
<td style="text-align:left">
{{ Form::text('report_name',$record['report_name']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("db_snippet_connection","db_snippet_connection") }}
</td>
<td style="text-align:left">
{{ Form::text('db_snippet_connection',$record['db_snippet_connection']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("db_data_connection","db_data_connection") }}
</td>
<td style="text-align:left">
{{ Form::text('db_data_connection',$record['db_data_connection']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("db_host","db_host") }}
</td>
<td style="text-align:left">
{{ Form::text('db_host',$record['db_host']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("db_database","db_database") }}
</td>
<td style="text-align:left">
{{ Form::text('db_database',$record['db_database']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("db_username","db_username") }}
</td>
<td style="text-align:left">
{{ Form::text('db_username',$record['db_username']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("db_password","db_password") }}
</td>
<td style="text-align:left">
{{ Form::text('db_password',$record['db_password']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("db_charset","db_charset") }}
</td>
<td style="text-align:left">
{{ Form::text('db_charset',$record['db_charset']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("db_collation","db_collation") }}
</td>
<td style="text-align:left">
{{ Form::text('db_collation',$record['db_collation']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("db_prefix","db_prefix") }}
</td>
<td style="text-align:left">
{{ Form::text('db_prefix',$record['db_prefix']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("db_driver","db_driver") }}
</td>
<td style="text-align:left">
{{ Form::text('db_driver',$record['db_driver']) }}
</td>
</tr>
<tr>
<td style="text-align:left">
{{ Form::label("generated_files_folder","generated_files_folder") }}
</td>
<td style="text-align:left">
{{ Form::text('generated_files_folder',$record['generated_files_folder']) }}
</td>
</tr>

</tr>
                                           			
				</table>
				
		</div>   <!-- end div_inside_update_active_tasks -->				
	</div>   <!-- end update_active_tasks -->	
</div> <!-- end admin -->
	
	
@stop