@extends('layouts.main')

<?php 

//echo ($queryx[0]->record_type);
//"exit("exit 4");
//var_dump($queryx);exit("exit 4");
/*

var_dump($queryx[1]);exit("exit 4");
//print_r(Input::all());

print_r(Input::all());//exit("xit index")
*/
//var_dump($queryx);
//exit("exit 4");


if (isset($queryx)){
	$passed_array = false;
}
else{
	//exit("indexmain exit 24");
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
		
	   	@foreach($queryx as $query)
	   		<?php	//var_dump($queryx);//exit("exit 16"); 

				//@if((isset($query->node_name))	)
	   		?>

	   		
	   		@if($query->node_name == "miscThings")	
			   	<li>
			   		<a href="{{ URL::route($query->node_name.'.indexReports', $parameters = array('id'=>$query->id,
			   			'reportDefinitionKey'=>$report_definition_key
			   			)
			   		) }}" class="btn mycart-btn-row2">Manage {{$query->model_table}}</a>
			
			   	</li>
			@endif	


					

	   	@endforeach
	
		<li>
			{{ Form::open(array('url'=>'admin/main/programmerUtilities', 'method'=>'GET')) }}
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