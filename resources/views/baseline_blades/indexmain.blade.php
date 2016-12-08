@extends('layouts.main')

<?php 

//echo ($queryx[0]->record_type);
//"exit("exit 4");
//var_dump($queryx[0]);exit("exit 4");
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
	indexmain
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
		{{--$queryx[0]->node_name--}}
	   	@foreach($queryx as $query)
	   		{{--  $query->node_name --}}
	   		@if($query->node_name == "miscThings")	
			   	<li>
					{{ Form::open(array('url'=>'admin/'.$query->node_name."/indexReports", 'method'=>'GET')) }}
					{{ Form::hidden('what_we_are_doing','going to indexReports') }}
					{{ Form::submit('Manage '.$query->model_table) }}
					{{ Form::close() }}
			   	</li>
			   	<li>
					{{ Form::open(array('url'=>'admin/'.$query->node_name."/indexReports", 'method'=>'GET')) }}
					{{ Form::hidden('what_we_are_doing','going to indexReports') }}
					{{ Form::submit('indexReports '.$query->model_table) }}
					{{ Form::close() }}
			   	</li>
	   		<!--
			   	<li>
					{{ Form::open(array('url'=>'admin/'.$query->node_name."/indexReports", 'method'=>'GET')) }}
					{{ Form::hidden('what_we_are_doing','what_we_are_doing') }}
					{{ Form::submit('Manage '.$query->model_table) }}
					{{ Form::close() }}
			   	</li>
			-->
			<li>
			<!-- notice laravel is bypassed -->
	             	<a href="{{--route($query->node_name.'.indexReports')--}}" class="btn btn-warning">indexReports</a>
			   	</li>
			
			@endif						

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