@extends('layouts.main')
@section('promo')

<section id="promo">   
	dynamicMenu1

	<div id="promo-details"> 
		{{ HTML::image('/img/Alfa120pct.JPG', '69 myalfa',array('height'=>'160px'))}} 
	</div> <!-- end promo-details -->
</section><!-- promo -->
@stop


@section('content')
		Dynamically Display an array

<?php
	//var_dump($arr1);
	//var_dump($report_definition_key);
	//exit("indexReports.blade 17 ");
	//var_dump($msg_array);
	//exit("programmerUtilitiesMenu exit 24");

if (isset($arr1)){
	//var_dump($arr1);exit("xit 25 dynamicMenu1");
	$fieldNames = $arr1['fieldNames'];
	unset ($arr1['fieldNames']);
	
	//var_dump($fieldNames);exit("xit 25 dynamicMenu1");

	//exit("programmerUtilitiesMenu exit 24");
}
else{
	//exit("programmerUtilitiesMenu exit 26");
}
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
		<?php $rowcount++;?>
		<tr>
			@foreach($fieldNames as $fieldName)	
			<?php //echo($fieldName);//exit("xit 94");?>
				<td class='border_left'>
					{!!  $fieldName	 !!}					
				</td>
			@endforeach
		</tr>

		@foreach($arr1 as $index=>$value)
		<?php //var_dump($arr1);//exit("xit 92");?>
		<tr>
			@foreach($fieldNames as $fieldName)	
			<?php //echo($fieldName);//exit("xit 94");?>
				<td class='border_left'>
				{!!  $arr1[$index][$fieldName]				 !!}					
				</td>
			@endforeach
				


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
