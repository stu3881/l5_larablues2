@extends('layouts.main')
@section('promo')

<section id="promo">   
	dynamicMenu0

	<div id="promo-details"> 
		{{ HTML::image('/img/Alfa120pct.JPG', '69 myalfa',array('height'=>'160px'))}} 
	</div> <!-- end promo-details -->
</section><!-- promo -->
@stop


@section('content')
		{{$parm1}}

<?php
	//var_dump($required_variables);exit("dynamicMenu0 exit 18");
       //$required_variables = array(
	
    $array1           = $required_variables['array1'];
    //$parm2            = $required_variables['parm2'];
    //$json_array1       = $required_variables['json_array1'];
    //'id'                = $required_variables[$parm1,

    $node_name         = $required_variables['node_name'];     
    $myStrings         = $required_variables['myStrings'];
    //echo("<br/><br/><br/>");    print_r($array1);exit("dynamicMenu0 exit 28");print_r($array_of_encoded_variables);
	//var_dump($array1);exit("dynamicMenu0 exit 28");
	//var_dump($array_of_parm2_array);exit("dynamicMenu0 exit 28");
	//var_dump($parm2);exit("dynamicMenu0 exit 18");
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
		<table id="table_inside_update_active_tasks" style="width:$width">
	<th></th>
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
			   		) }}" class="btn mycart-btn-row2">programmer utilities NEW2</a>
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
		{{-- Form::hidden('view_variables_array',$parm2) --}}
		
		<!-- 			
		// *********
		// read loop
		// *********
		 -->
		<?php $rowcount++;?>


		@foreach($array1 as $table=>$value)
			<tr>
				<?php //echo ("<td class='".$array1[$table]['class'][0]."' >"); ?>
				<td class={{$array1[$table]['class'][0]}} >
					{{$table}}
				</td>

				@if ($what_we_are_doing == 'activate_deactivate_table_reporting')
					<?php echo ("<td class='".$array1[$table]['class'][0]."' >"); ?>
				@else
					<td class='border_left'>
				@endif


				@if ($what_we_are_doing == 'activate_deactivate_table_reporting')
	  		        {{$array1[$table]['field'][0]}}
				@else
				 	<a href="{{ URL::route($node_name.'.generic_method_request_2parms', $parameters = array(
					 	'parm1' => $parm1,	  		    
		  		        'parm2' => $array_of_parm2_array[$table]['parm2_array'])) }}" > 


					
				@endif

				</td>	

			@if ($what_we_are_doing == 'activate_deactivate_table_reporting')
			@if($array1[$table]['field'][1] == "validate")	
				<?php echo ("<td class='".$array1[$table]['class'][0]."' >"); ?>
			 	<a href="{{ URL::route($node_name.'.generic_method_request_2parms', $parameters = array(
					 	'parm1' => $parm1,	  		    
		  		        'parm2' => 'parm2')) }}" >
				
	  		        {{$array1[$table]['field'][1]}}
				@else
					{{$table}}
					
				@endif
			
			</td>

			@endif						



			<?php /*'tdBegin'           =>"<td class='text_align_left select_pink' >",  */ ?>
			<?php //echo($myStrings['tdBegin']);?>

				@if($array1[$table]['field'][0] == "edit1")	
					@include($node_name.'/'.'hardcoded_report_getEdit_snippet')
				@endif						
 
		
			<?php echo($myStrings['tdEnd']);?>		

		</tr>
				
		@endforeach
		 
		@if ($what_we_are_doing == 'reports_with_broken_links')
			@foreach($array1 as $table=>$value)
				<?php //echo ($table."**");var_dump($array1);exit('at 88') ?>
				<tr>
					<td>
						{{$table}}
					</td>

					<td>
						 	<a href="{{ URL::route($node_name.'.generic_method_request_2parms', $parameters = array(
						 	'parm1' => $parm1,	  		    
			  		        'parm2' => $array_of_parm2_array[$table]['parm2_array'])) }}" > 
	        					{{$table}}
	        				</a>
					</td>		
				</tr>
					
			@endforeach
		@endif		
		
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
