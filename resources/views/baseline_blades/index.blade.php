@extends('layouts.main')
@section('promo')
	<section id="promo">     
		<div id="promo-details"> 
			{{ HTML::image('img/72ferrari246.jpg', '72 ferrari dino',array('height'=>'272px'))}} 
			{{ HTML::image('img/Alfa120pct.JPG', '69 myalfa',array('height'=>'272px'))}} 

		

		</div> <!-- end promo-details -->
	</section><!-- promo -->
@stop

<?php 
//print_r($node_name);//print_r($generated_snippets_array);
//exit('*exit 11 ');
$generated_snippets_array = (array) $generated_snippets_array;
//$model_table = $generated_snippets_array['table_name'];
$model_table = $model_table;
$node_name = $node_name;
$snippet_table = $snippet_table;

//echo $node_name;//print_r($generated_snippets_array); exit('*exit 11 ');

?>

@section('content')
<div id="admin">
<?php //  echo '<br>id=';  exit('*exit 11 ');?>
@section('hard_title')
		<h1>{{$model_table}} Admin Panel</h1><hr>
@stop

@section('vertical_navigation_ul')
	<div id="admin_nav_bar" style="width:98%">	
		<div id="admin_nav_bar_center" style="width:270px;text-align:left;background-color:#F0E68C;">	
			<ul>
			<li>
				{{ Form::open(array('url'=>'admin/'.$node_name.'/edit1', 'method'=>'GET')) }}
				{{ Form::hidden('model_table',$model_table) }}
				{{ Form::hidden('node_name',$node_name) }}
				{{ Form::hidden('snippet_table',$snippet_table) }}
				{{ Form::submit('maintain reports') }}
				{{ Form::close() }}
			</li>
			<li>{{ HTML::link('admin/main', 'main menu') }}</li>
						<!-- -->
			<li>
				{{ Form::open(array('url'=>'admin/'.$model_table.'/edit4', 'method'=>'GET')) }}
				{{ Form::hidden('edit4_option','programmer_utilities_menu') }}
				{{ Form::hidden('snippet_table',$snippet_table) }}
				{{ Form::hidden('model_table',$model_table) }}
				{{ Form::hidden('node_name',$node_name) }}
				{{ Form::submit('programmer utilities') }}
				{{ Form::close() }}
			</li>
			<!-- -->
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
							{{ Form::open(array('url'=>'admin/'.$node_name.'/edit2', 'method'=>'GET')) }}
							{{ Form::hidden('foo','value') }}
							{{ Form::submit('set active by shift', array('class'=>'mycart-btn')) }}
							{{ Form::close() }}
							</td><td>	
							{{ Form::open(array('url'=>'admin/'.$node_name.'/edit2', 'method'=>'GET')) }}
							{{ Form::hidden('foox','valuex') }}
							{{ Form::submit('set active by name', array('class'=>'mycart-btn')) }}
							{{ Form::close() }}
						</td><td>	
							
							{{ Form::open(array('url'=>'admin/'.$node_name, 'method'=>'GET')) }}
							{{ Form::submit('Tasks menu', array('class'=>'mycart-btn10')) }}
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
