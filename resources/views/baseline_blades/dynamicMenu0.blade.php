@extends('layouts.main')

@section('promo')

<section id="promo">   
	dynamicMenu0

	<div id="promo-details"> 
		{{-- HTML::image('/img/Alfa120pct.JPG', '69 myalfa',array('height'=>'160px'))--}} 
		{{ HTML::image('img/AlfaHiRes373x177.jpg', '69 myalfa',array('height'=>'92px'))}} 

	</div> <!-- end promo-details -->
</section><!-- promo -->
@stop


@section('content')
		{{$parm1}}

<?php
	//var_dump($required_variables);exit("dynamicMenu0 exit 18");
       //$required_variables = array(
	
    
    //$parm2            = $required_variables['parm2'];
    //'id'                = $required_variables[$parm1,
    $no_of_fields_start = 1;
    $no_of_fields_stop = $no_of_fields -1;
    $node_name         = $required_variables['node_name'];     
    $myStrings         = $required_variables['myStrings'];
    //echo("<br/><br/><br/>");    print_r($view_variables_array);exit("dynamicMenu0 exit 28");print_r($array_of_encoded_variables);
	//var_dump($view_variables_array);//exit("dynamicMenu0 exit 28");
	//var_dump($array_of_parm2_array);exit("dynamicMenu0 exit 28");
	//echo("34 process_fields_as***".$process_fields_as." dynamicMenu0");
	//var_dump($report_definition_key);
	//exit("dynamicMenu0.blade 17 ");
	$browse_select_field_count=3;
	$rowcount = -1;

	$i =  1;
	//var_dump($myStrings);var_dump($parameters);
		//exit("exit in dynamicMenu0");
	// *********************
	?>
	
	<div id="admin" style="width:800px;height:99%">
	
	{{ Form::open(array('url'=>'admin/'.'node_name'.'/add'	,'method'=>'GET')) }}
	
	
	<p>		
	<div id="div_inside_update_active_tasks" style="width:$width" >		
		<div id="div_inside_update_active_tasks_button_bar" style="width:$width">	
		<table id="table_inside_update_active_tasks" style="width:$width,text-align:left">
	
		<tr class="table_no_lines">
		<td colspan={{$browse_select_field_count}} >	
			<table class="table_no_lines">
				<tr class="table_no_lines">
				<td>	
			   		<a href="{{ URL::route('miscThings'.'.create_w_report_id', $parametersx = array(
				   		'report_definition_key'=>'report_definition_key')
				   		) }}" class="btn mycart-btn-row2">
						Initialize_New_Report
				 	</a>

				</td>
				<td class="table_no_lines">
					<a href="{{ URL::route('Main.getIndex', $parametersx = array('method'=>'GET')) }}" class="btn mycart-btn-row2">Main menu</a>
				</td>
				<td class="table_no_lines">
				
			   		<a href="{{ URL::route('programmerUtilities'.'.mainMenu', $parameters = array('id'=>1,
			   			'reportDefinitionKey'=>$report_definition_key
			   			)
			   		) }}" class="btn mycart-btn-row2">programmer utilities </a>
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

		{{ Form::open(array('url'=>$node_name.'/reportDefEdits', 'method'=>'GET')) }}
	
		<!-- 			
		// *********
		// read loop
		// *********
		 -->
		<?php $rowcount++;?>

			<?php //echo ($process_fields_as.' value'."**");exit('exit at 98') ?>

		 
			@foreach($view_variables_array as $table=>$value)
				<?php //echo ($table."**");//var_dump($view_variables_array);//exit('at 88') ?>
				<?php //echo ('value'."**");var_dump($value);exit('at 103') ?>
				<?php //echo ('value'."**");var_dump($value);exit('at 88') ?>
				<tr>
					<td style="text-align:left","background-color:#cbe6ce">
						
						{{$value['field'][0]}} 
					</td>
					<?php //echo ('no_of_fields_start'." ** ".$no_of_fields_start."  ".$no_of_fields);//var_dump($value);exit('exit at 111') ?>

					@for ($i = $no_of_fields_start; $i <= $no_of_fields_stop; $i++)
						<?php //echo ('parm2'."**");var_dump($array_of_parm2_array[$table]['parm2_array'][$i]);exit('at 108') ?>
					<?php //echo ('value'."**".$process_fields_as);var_dump($value);//exit('exit at 111') ?>
					@if($process_fields_as =='links')
						<td class={{$value['class'][$i]}} > 

						 	<a href="{{ URL::route($node_name.'.generic_method_request_2parms', $parameters = array(
						 	'parm1' => $parm1,	  		    
			  		        'parm2' => $array_of_parm2_array[$table]['parm2_array'][$i])) }}" > 
		    					{{$value['field'][$i]}} 
		    				</a>
						</td>	
					@endif
					@if($process_fields_as == 'fields')
					<?php //echo ('value'."**".$process_fields_as);var_dump($value);exit('exit at 131') ?>
					
						<td class={{$value['class'][$i]}} > 
    						{{$value['field'][$i]}} 
						</td>	

					@endif
									<?php //echo ('value'."**");exit('at 129') ?>

					@endfor
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
	

<script>
function confirmDelete() {
var result = confirm('Are you sure you still want to lick my pussy?');

if (result) {
        return true;
    } else {
        return false;
    }
}</script>	




	</div> <!-- end admin -->

	
@stop
</body>
