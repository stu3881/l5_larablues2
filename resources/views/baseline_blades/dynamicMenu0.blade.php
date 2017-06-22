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
		Activate/Deactivate table reporting

<?php
	//var_dump($arr1);
	//var_dump($report_definition_key);
	//exit("indexReports.blade 17 ");
$browse_select_field_count=3;
	$what_we_are_doing = 'what_we_are_doing';
	$coming_from = 'edit1';

$rowcount = -1;

	$i =  1;
	//var_dump($myStrings);var_dump($parameters);
		//exit("exit in dynamicMenu0");
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
		<tr>
			<td class='border_left'>
				{{ Form::open(array('url'=>'admin/'.$node_name.'/reportDefEdits', 'method'=>'GET')) }}
			<?php echo ("<td class='".$arr1[$table]['class'][0]."' >"); ?>
				 	<a href="{{ URL::route($node_name.'.activateDeactivate', $parameters = array(
				 	'id'=> $arr1[$table]['key_value'][0],
	  		        'what_we_are_doing'=> $arr1[$table]['aord'][0],
	  		        'table'=> $table)) }}" >
	  		        {{$arr1[$table]['aord'][0]." ".$table}}
			<?php echo($myStrings['tdEnd']);?>		
			</td>



						<td class='border_left'>
				{{ Form::open(array('url'=>'admin/'.$node_name.'/reportDefEdits', 'method'=>'GET')) }}
			<?php echo ("<td class='".$arr1[$table]['class'][1]."' >"); ?>
				 	<a href="{{ URL::route($node_name.'.activateDeactivate', $parameters = array(
				 	'id'=> $arr1[$table]['key_value'][1],
	  		        'what_we_are_doing'=> $arr1[$table]['aord'][1],
	  		        'table'=> $table)) }}" >
	  		        {{$arr1[$table]['aord'][1]." ".$table}}
			<?php echo($myStrings['tdEnd']);?>		
			</td>

			<?php /*'tdBegin'           =>"<td class='text_align_left select_pink' >",  */ ?>
			<?php //echo($myStrings['tdBegin']);?>

				@if($arr1[$table]['aord'][0] == "edit1")	
					@include($node_name.'/'.'hardcoded_report_getEdit_snippet')
				@endif						
 
		
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
