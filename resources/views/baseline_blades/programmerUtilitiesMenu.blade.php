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
//var_dump($menu_array);

//var_dump($method_parameters_array);
//var_dump($method_parameters_array['configure_an_unconfigured_table']);
//exit("19 this is an echo/exit in programmerUtilitiesMenu in baseline_blades");


if (isset($menu_array)){
	$passed_array = false;
}
else{
	//exit("programmerUtilitiesMenu exit 24");
}



?>
<?php 
//var_dump($queryx[0]);

//var_dump($options_parameters);
//exit('exit in '.'programmerUtilityMenu');
?>

@section('promo')
<section id="promo">     
	<div id="promo-details-identity"> 

	programmersUtilitiesMenu

 	</div> 
 		<div id="promo-details"> 
		{{-- HTML::image('img/Alfa120pct.JPG', '69 myalfa',array('height'=>'272px'))--}} 
  		{{ HTML::image('img/AlfaHiRes373x177.jpg', '69 myalfa',array('height'=>'192px'))}} 
 	</div> 

</section>
@stop

<?php 
//var_dump($queryx[0]);//exit("programmerUtilitiesMenuexit 47");
?>


@section('contentx')
<div id="user-menux" >
	<nav class="dropdown">
	@section('vertical_navigation_ul')
	<div id="admin_nav_bar" style="width:500px">	
	<div id="admin_nav_bar_center" style="width:400px;text-align:left;background-color:#F0E68C;">	
		<a href="#">{{ HTML::image('img/user-icon.gif', Auth::user()->firstname) }} {{ Auth::user()->firstname }} {{ HTML::image('img/down-arrow.gif', Auth::user()->firstname) }}</a>
		<ul>


		   	@foreach($menu_array as $name=>$method)
		   		<?php	
		   		// We're adding a little functionality without having to define a new route each time
		   		// we just make one of the original fields an array and pass anything we need
		   		//var_dump($method_parameters_array);
		   		//var_dump($menu_array);
		   		//exit("programmerUtilitiesMenu 62"); 
				//echo($name.'*'.$link);exit("programmerUtilitiesMenu 62"); 
				/*  
			   		<a href="{{ URL::route('programmerUtilities'.'.mainMenu', $parameters = array('id'=>'query->id',
			   			'reportDefinitionKey'=>'report_definition_key'
			   			)
			   		) }}" class="btn mycart-btn-row2">{{$name}}</a>

				*/
		   		?>
				<li>
			   		<a href="{{ URL::route('programmerUtilities.'.$method, $method_parameters_array[$name]
			   		) }}" class="btn mycart-btn-row2">{{$name}}</a>
			   	</li>
		   		
		   	@endforeach
		</ul>
	</div>
</div>

</nav>
    
</div><!-- end user-menu -->
@stop