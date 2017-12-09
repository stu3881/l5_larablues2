@extends('layouts.main')

@section('promo')

<section id="promo">     
	<div id="promo-details"> 
		{{ HTML::image('img/72ferrari246.jpg', '72 ferrari dino',array('height'=>'172px'))}} 
		</div> <!-- end promo-details -->
</section><!-- promo -->
@stop

@section('content')

	<?php 
		//echo"inside select_fields_blade<br>";exit("exit15");
		$coming_from = "reportDefMenuEdit";
		//exit("17 exit select_fields");

		 

	?>

		
  <!doctype html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>Move from one select box to another</title>
    <style type="text/css">
    select {
        width: 200px;
        float: left;
    }
    .controls {
        width: 40px;
        float: left;
        margin: 10px;
    }
    .controls a {
        background-color: #222222;
        border-radius: 4px;
        border: 2px solid #000;
        color: #ffffff;
        padding: 2px;
        font-size: 14px;
        text-decoration: none;
        display: inline-block;
        text-align: center;
        margin: 5px;
        width: 20px;
    }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js">
    </script>
    <script>
    function moveAll(from, to) {
        $('#'+from+' option').remove().appendTo('#'+to); 
    }
    
    function moveSelected(from, to) {
        $('#'+from+' option:selected').remove().appendTo('#'+to); 
    }
    </script>
</head>
    
<body>
{{ $message }}
<div id="admin" style="width:460px;background-color: #aabbcc;">aa


		{!! Form::model($model,['method' => 		'PUT','route'=>[$node_name.'.update',$miscThing[0]->id,$what_we_are_doing,$coming_from]]) !!}

		{{ Form::hidden('coming_from'						,'select_fields') }}
		{{ Form::hidden('what_we_are_doing'					,$what_we_are_doing) }}
		{{ Form::hidden('edit4_option'						,'update_field_list') }}
		{{-- Form::hidden('report_key'						, $miscThing[0]->id) --}}
		{{ Form::hidden('report_key'						, $report_definition_id) }}
		@if($what_we_are_doing == "maintain_browse_fields")	
			{{ Form::hidden('browse_select_array'		, "") }}
		@endif						
		@if($what_we_are_doing == "maintain_modifiable_fields")	
			{{ Form::hidden('modifiable_fields_array'		, "") }}
		@endif						

	

		<div id="abstract_div" style="background-color: #ccbb00;">cc
				<div id="column_names_select_div">xx
					{{ Form::select('from[]',$from_array,array(),array('multiple','size'=>15,'id'=>'from')) }}
					<div class="controls"> 
						<a href="javascript:moveAll('from', 'to')">&gt;&gt;</a> 
						<a href="javascript:moveSelected('from', 'to')">&gt;</a> 
						<a href="javascript:moveSelected('to', 'from')">&lt;</a> 
						<a href="javascript:moveAll('to', 'from')" href="#">&lt;&lt;</a>
					</div>
					{{ Form::select('to[]',$to_array,$to_array,array('multiple','size'=>15,'id'=>'to')) }}
					<!-- we need the brackets behind to because it's an array -->				

		<div style="position:relative; width:20%;"">	
		<table class="table_no_lines">
			<tr class="table_no_lines" colspan=3>
				<td>	
					{{ Form::submit("update list", array('class'=>'cart-btn')) }}
					{{ Form::close() }}
				</td>
								
  		        <td>
	  		        <a href="{{ URL::route($node_name.'.reportDefMenuEdit', 
	  		        $parameters = array(
	  		        'id'=>$miscThing[0]->id,
	  		        'what_we_are_doing'=>$what_we_are_doing,
	  		        'coming_from'=> 'select_fields'
	  		        )) }}" class="btn btn-warning">
	  		        ReportDefMenuEdit
	  		        </a>
				</td>


					<td class="table_no_lines">
				   		<a href="{{ URL::route($miscThing[0]->node_name.'.indexReports', 
					   		$parameters = array(
					   		'id'=>$miscThing[0]->id,
			   				'reportDefinitionKey'=>$report_definition_id
			   				)
		   				) }}" class="btn mycart-btn-row2">Reports menu</a>
					</td>
								<td class="table_no_lines">
									<a href="{{ URL::route('Main.getIndex', $parameters = array('method'=>'GET')) }}" class="btn mycart-btn-row2">Main menu</a>
								</td>

								</tr>
							</table>
					</div> <!-- end div_inside_update_active_tasks --> 

		</div> <!-- end abstract_div --> 

</div> <!-- end admin -->    
</body>
</html>



@stop
</body>