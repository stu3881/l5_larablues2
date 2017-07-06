@extends('../layouts/main')

<?php 


if (isset($report_definition_key)){
	var_dump($encoded_business_rules);
	echo('__FILE__'. "zzz  ");var_dump($modifiable_fields_array);
  
	//exit("exit 8");

}
//var_dump($encoded_business_rules);
//exit("exit 8");
?>

@section('promo')

<section id="promo">   
	create  
	<div id="promo-details"> 
		{{ HTML::image('/img/Alfa120pct.JPG', '69 myalfa',array('width'=>'100px'))}} 
	</div> <!-- end promo-details -->
</section><!-- promo -->
@stop

@section('content')
    <h1>Create new report_definition</h1>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif 

		<div id="div_inside_update_active_tasks" >	<!--div_inside_update_active_tasks -->
			{{ Form::open(array('url'=>'admin/'.$node_name, 'method'=>'POST')) }}
			<!-- this will default to store -->
			{{ method_field('POST') }}	
			

				<table id="outer_tbl_0" class="table_inside_update_active_tasks">
				<tr class="table_no_lines">
				<td colspan="3">	
				<table id="inner_tbl_0_0" class="table_no_lines">
					<tr class="table_no_lines">


					<td class="table_no_lines">
				   		<a href="{{ URL::route($node_name.'.indexReports', 
				   		$parameters = array(
				   		'id'=>$report_definition_key,
			   			'reportDefinitionKey'=>$report_definition_key
			   			)) }}" class="btn mycart-btn-row2">reports list
			   			</a>
					</td>
					<td class="table_no_lines">
						{{ Form::hidden('id'	,$report_definition_key) }}
						{{ Form::hidden('modifiable_fields_array'	,$modifiable_fields_array) }}
						{{ Form::hidden('report_definition_id'	,$report_definition_key) }}
				   
						{{ Form::hidden('encoded_business_rules'	,$encoded_business_rules) }}
					 	{{ Form::submit('form-store') }}
					</td>
								

					<td class="table_no_lines">
						<a href="{{ URL::route('Main.getIndex', 
						$parameters = array(
						'method'=>'GET',)) }}" 
						class="btn mycart-btn-row2">Main menu</a>
					</td>

					@include($snippet_file)    
			{{ Form::close() }}

		</div>
@stop
