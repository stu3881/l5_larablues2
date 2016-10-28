@extends('layouts.main')
@section('promo')
	<section id="promo">     
		<div id="promo-details"> 
		{{ HTML::image('img/72ferrari246.jpg', 'ferarri pic logo',array('height'=>'172px'))}} 
		</div> <!-- end promo-details -->
	</section><!-- promo -->
@stop

<?php //echo '<br>index<br>';print_r($_REQUEST);  exit('*exit 11 ');
$node_name 						= 'miscThings';
	$menu_array_names=array(
		'maintain_database_connections', 
		'drive_db_connection_regen_by_table_controller',
		'change_database_connection',
		'add_additional_database_table',
		'table_controller_generators',
		'generate_new_node_in_route', 
		'generate_new_model', 
		'generate_new_controller', 
		'establish_reporting_for_table', 
		'convert_controllers_to_generated_controllers',
		'restore_from_baseline',
		'hide_name_value_data_for_demo1',
		'restore_name_value_data_for_demo1',
		'backup_generated_reports_for_demo1',
		'restore_generated_reports_for_demo1',
		'backup_generated_reports_for_demo2',
		'restore_generated_reports_for_demo2',
			
		'THESE ARE EITHER FUTURES OR ONE-TIMERS MADE INACTIVE',  // 9
		// update $label_or_sublit = "label";
		// move the above line up or down as appropriate (find below)
		
		'convert_business_rules_field_name_array',
		'convert_business_rules_r_o',
		'convert_single_array_query_r_o',
		'convert_single_array_query_field_name',
		'create_baseline_redirects',
		'randomize_email_in_volunteer',
		'randomize_v_name_in_volunteer',
		'',
		' ',
		'generate programmer utilities menu'	// 15 last occurrence add more
	);

?>
	

@section('content')
<div id="admin" style="width:700px">
<?php //  echo '<br>id=';  exit('*exit 11 ');?>
@section('hard_title')
		<h1>{{$node_name}} Programmer Utilities Menu</h1><hr>
@stop

@section('vertical_navigation_ul')
	<div id="admin_nav_bar" style="width:98%">	
		<div id="admin_nav_bar_center" style="width:270px;text-align:left;background-color:#F0E68C;">	
			<ul>
			<li>
				{{ Form::open(array('url'=>'admin/main', 'method'=>'GET')) }}
				{{ Form::submit('main menu') }}
				{{ Form::close() }}
			</li>
			<!-- -->

			<?php $label_or_sublit = "submit";?>
			
			<li>
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit6', 'method'=>'GET')) }}
				{{ Form::hidden('edit6_option',$menu_array_names[0]) }}
				{{ Form::hidden('button_name',$menu_array_names[0]) }}
				{{ Form::$label_or_sublit($menu_array_names[0]) }}
				{{ Form::close() }}
			</li>
			<li>
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit6', 'method'=>'GET')) }}
				{{ Form::hidden('edit6_option',$menu_array_names[1]) }}
				{{ Form::hidden('button_name',$menu_array_names[1]) }}
				{{ Form::$label_or_sublit($menu_array_names[1]) }}
				{{ Form::close() }}
			</li>
			<li>
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit6', 'method'=>'GET')) }}
				{{ Form::hidden('edit6_option',$menu_array_names[2]) }}
				{{ Form::hidden('button_name',$menu_array_names[2]) }}
				{{ Form::$label_or_sublit($menu_array_names[2]) }}
				{{ Form::close() }}
			</li>
			<li>
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit6', 'method'=>'GET')) }}
				{{ Form::hidden('edit6_option',$menu_array_names[3]) }}
				{{ Form::hidden('button_name',$menu_array_names[3]) }}
				{{ Form::$label_or_sublit($menu_array_names[3]) }}
				{{ Form::close() }}
			</li>
			<li>
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit6', 'method'=>'GET')) }}
				{{ Form::hidden('edit6_option',$menu_array_names[4]) }}
				{{ Form::hidden('button_name',$menu_array_names[4]) }}
				{{ Form::$label_or_sublit($menu_array_names[4]) }}
				{{ Form::close() }}
			</li>
			<li>
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit6', 'method'=>'GET')) }}
				{{ Form::hidden('edit6_option',$menu_array_names[5]) }}
				{{ Form::hidden('button_name',$menu_array_names[5]) }}
				{{ Form::$label_or_sublit($menu_array_names[5]) }}
				{{ Form::close() }}
			</li>
			<li>
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit6', 'method'=>'GET')) }}
				{{ Form::hidden('edit6_option',$menu_array_names[6]) }}
				{{ Form::hidden('button_name',$menu_array_names[6]) }}
				{{ Form::$label_or_sublit($menu_array_names[6]) }}
				{{ Form::close() }}
			</li>
			<li>
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit6', 'method'=>'GET')) }}
				{{ Form::hidden('edit6_option',$menu_array_names[7]) }}
				{{ Form::hidden('button_name',$menu_array_names[7]) }}
				{{ Form::$label_or_sublit($menu_array_names[7]) }}
				{{ Form::close() }}
			</li>
			<li>
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit6', 'method'=>'GET')) }}
				{{ Form::hidden('edit6_option',$menu_array_names[8]) }}
				{{ Form::hidden('button_name',$menu_array_names[8]) }}
				{{ Form::$label_or_sublit($menu_array_names[8]) }}
				{{ Form::close() }}
			</li>
			<li>
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit6', 'method'=>'GET')) }}
				{{ Form::hidden('edit6_option',$menu_array_names[9]) }}
				{{ Form::hidden('button_name',$menu_array_names[9]) }}
				{{ Form::$label_or_sublit($menu_array_names[9]) }}
				{{ Form::close() }}
			</li>
			<li>
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit6', 'method'=>'GET')) }}
				{{ Form::hidden('edit6_option',$menu_array_names[10]) }}
				{{ Form::hidden('button_name',$menu_array_names[10]) }}
				{{ Form::$label_or_sublit($menu_array_names[10]) }}
				{{ Form::close() }}
			</li>
			<li>
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit6', 'method'=>'GET')) }}
				{{ Form::hidden('edit6_option',$menu_array_names[11]) }}
				{{ Form::hidden('button_name',$menu_array_names[11]) }}
				{{ Form::$label_or_sublit($menu_array_names[11]) }}
				{{ Form::close() }}
			</li>
			<li>
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit6', 'method'=>'GET')) }}
				{{ Form::hidden('edit6_option',$menu_array_names[12]) }}
				{{ Form::hidden('button_name',$menu_array_names[12]) }}
				{{ Form::$label_or_sublit($menu_array_names[12]) }}
				{{ Form::close() }}
			</li>
			<li>
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit6', 'method'=>'GET')) }}
				{{ Form::hidden('edit6_option',$menu_array_names[13]) }}
				{{ Form::hidden('button_name',$menu_array_names[13]) }}
				{{ Form::$label_or_sublit($menu_array_names[13]) }}
				{{ Form::close() }}
			</li>
			<li>
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit6', 'method'=>'GET')) }}
				{{ Form::hidden('edit6_option',$menu_array_names[14]) }}
				{{ Form::hidden('button_name',$menu_array_names[14]) }}
				{{ Form::$label_or_sublit($menu_array_names[14]) }}
				{{ Form::close() }}
			</li>
			<?php $label_or_sublit = "label";?>
			<li>
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit6', 'method'=>'GET')) }}
				{{ Form::hidden('edit6_option',$menu_array_names[15]) }}
				{{ Form::hidden('button_name',$menu_array_names[15]) }}
				{{ Form::$label_or_sublit($menu_array_names[15]) }}
				{{ Form::close() }}
			</li>
			
			<li>
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit6', 'method'=>'GET')) }}
				{{ Form::hidden('edit6_option',$menu_array_names[16]) }}
				{{ Form::hidden('button_name',$menu_array_names[16]) }}
				{{ Form::$label_or_sublit($menu_array_names[16]) }}
				{{ Form::close() }}
			</li>
			
			<li>
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit6', 'method'=>'GET')) }}
				{{ Form::hidden('edit6_option',$menu_array_names[17]) }}
				{{ Form::hidden('button_name',$menu_array_names[17]) }}
				{{ Form::$label_or_sublit($menu_array_names[17]) }}
				{{ Form::close() }}
			</li>
			
			<li>
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit6', 'method'=>'GET')) }}
				{{ Form::hidden('edit6_option',$menu_array_names[18]) }}
				{{ Form::hidden('button_name',$menu_array_names[18]) }}
				{{ Form::$label_or_sublit($menu_array_names[18]) }}
				{{ Form::close() }}
			</li>
			
			<li>
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit6', 'method'=>'GET')) }}
				{{ Form::hidden('edit6_option',$menu_array_names[19]) }}
				{{ Form::hidden('button_name',$menu_array_names[19]) }}
				{{ Form::$label_or_sublit($menu_array_names[19]) }}
				{{ Form::close() }}
			</li>
			
			<li>
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit6', 'method'=>'GET')) }}
				{{ Form::hidden('edit6_option',$menu_array_names[20]) }}
				{{ Form::hidden('button_name',$menu_array_names[20]) }}
				{{ Form::$label_or_sublit($menu_array_names[20]) }}
				{{ Form::close() }}
			</li>
			
			<li>
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit6', 'method'=>'GET')) }}
				{{ Form::hidden('edit6_option',$menu_array_names[21]) }}
				{{ Form::hidden('button_name',$menu_array_names[21]) }}
				{{ Form::$label_or_sublit($menu_array_names[21]) }}
				{{ Form::close() }}
			</li>
			
			
			</ul>
		</div>
	</div>
@stop


@section('NOTnavigation_bar')
	<div id="admin_nav_bar">	
		<div id="admin_nav_bar_center">	
			<table class="table_no_lines">
				<tr class="table_no_lines">
				<td colspan="4">	
					<table class="table_no_lines">
						<tr class="table_no_lines">
						<td class="table_no_lines">
							{{ Form::open(array('url'=>'admin/main', 'method'=>'GET')) }}
							{{ Form::submit('Update Active Tasks') }}
							{{ Form::close() }}
						</td><td>	
							{{ Form::open(array('url'=>'admin/main', 'method'=>'GET')) }}
							{{ Form::submit('add new task', array('class'=>'mycart-btn')) }}
							{{ Form::close() }}
						</td><td>	
							{{ Form::open(array('url'=>'admin/main', 'method'=>'GET')) }}
							{{ Form::submit('modify/delete existing task', array('class'=>'mycart-btn','foo'=>'bar')) }}
							{{ Form::close() }}
							</td><td>	
							{{ Form::open(array('url'=>'admin/miscThings/edit2', 'method'=>'GET')) }}
							{{ Form::hidden('foo','value') }}
							{{ Form::submit('set active by shift', array('class'=>'mycart-btn')) }}
							{{ Form::close() }}
							</td><td>	
							{{ Form::open(array('url'=>'admin/miscThings/edit2', 'method'=>'GET')) }}
							{{ Form::hidden('foox','valuex') }}
							{{ Form::submit('set active by name', array('class'=>'mycart-btn')) }}
							{{ Form::close() }}
						</td><td>	
							
							{{ Form::open(array('url'=>'admin/miscThings', 'method'=>'GET')) }}
							{{ Form::submit('miscThings/menu', array('class'=>'mycart-btn10')) }}
							{{ Form::close() }}
						</td><td>	
							{{ Form::open(array('url'=>'admin/main', 'method'=>'GET')) }}
							{{ Form::submit('Main menu', array('class'=>'mycart-btn')) }}
							{{ Form::close() }}
						</td></tr>
					</table>
				</td></tr>
			</table>
		</div>
	</div>
	
@stop		


	

	</div> <!-- end admin -->
	
	
@stop

