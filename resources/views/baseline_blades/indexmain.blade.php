@extends('layouts.main')

<?php 

//echo ($queryx[0]->record_type);
//"exit("exit 4");
/*

var_dump($queryx[1]);exit("exit 4");
//print_r(Input::all());

print_r(Input::all());//exit("xit index")
*/
//var_dump($queryx);
//exit("exit 4");

$passed_array = true;
if (isset($queryx)){
	$passed_array = false;
	//var_dump($queryx[0]);exit("exit 16");
}
else{
	$queryx = array();
	$queryx['node_name'] = "index";
	$queryx['model_table'] = "miscThings";
	$queryx['controller_name'][] = "a";
	$queryx['controller_name'][] = "b";
	$queryx['controller_name'][] = "c";
	$queryx = (object) $queryx;
}



?>

@section('promo')
<section id="promo">     
	<div id="promo-details-identity"> 
	this is indexmain.blade in baseline_blades
 	</div> 
 		<div id="promo-details"> 
		{{-- HTML::image('img/Alfa120pct.JPG', '69 myalfa',array('height'=>'272px'))--}} 
  		{{ HTML::image('img/AlfaHiRes373x177.jpg', '69 myalfa',array('height'=>'192px'))}} 
 	</div> 

</section>
@stop





@section('contentx')
<div id="user-menux" >
	<nav class="dropdown">
	@section('vertical_navigation_ul')
	<div id="admin_nav_bar" style="width:500px">	
	<div id="admin_nav_bar_center" style="width:400px;text-align:left;background-color:#F0E68C;">	
		<a href="#">{{ HTML::image('img/user-icon.gif', Auth::user()->firstname) }} {{ Auth::user()->firstname }} {{ HTML::image('img/down-arrow.gif', Auth::user()->firstname) }}</a>
		<ul>
		   	<?php //echo"fart";exit("exit 60");?>
		<li>
			{{ Form::open(array('url'=>'admin/miscThings', 'method'=>'GET')) }}
			{{ Form::submit('Manage miscThings') }}
			{{ Form::close() }}
		</li>
	   	@foreach($queryx as $query)
		   	<?php //echo"fart";exit("exit 74");?>
		   	<li>
		   	@if ($passed_array)
				{{ Form::open(array('url'=>'admin/'."$query->node_name", 'method'=>'GET')) }}
				{{ Form::submit('Manage '.$query->node_name) }}
				{{ Form::close() }}
		   	@else
				{{ Form::open(array('url'=>'admin/'.$query->node_name, 'method'=>'GET')) }}
				{{ Form::submit('Manage '.$query->model_table) }}
				{{ Form::close() }}
	   		@endif
		   	</li>
	   	
	   	@endforeach
	
		<li>
			{{ Form::open(array('url'=>'admin/main/edit6', 'method'=>'GET')) }}
			{{ Form::hidden('edit6_option','programmer_utilities_menu') }}
			{{ Form::submit('programmer utilities') }}
			{{ Form::close() }}
		</li>

		<li>{{ HTML::link('users/signout', 'Sign Out') }}</li>
		</ul>
	</div>
</div>

</nav>
    
</div><!-- end user-menu -->
@stop