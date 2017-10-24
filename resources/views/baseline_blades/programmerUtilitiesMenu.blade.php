@extends('layouts.main')

<?php 

//echo ($queryx[0]->record_type);
//"exit("exit 4");
//var_dump($queryx);exit("exit 4");

//var_dump($parm2_array);

//var_dump($encoded_method_parameters);
echo("<br>13 echo in programmerUtilitiesMenu in baseline_blades");
//echo("<br/>parm1_array ");var_dump($parm1_array);
//echo("<br/><br/>parm2_array ");var_dump($parm2_array);
//echo("19 echo in programmerUtilitiesMenu in baseline_blades");

//exit("19 exit in programmerUtilitiesMenu in baseline_blades");
?>
<?php 
//var_dump($queryx[0]);

//var_dump($options_parameters);
//exit('exit in '.'programmerUtilityMenu');
?>
{{ Form::open(array('url'=>$node_name.'/reportDefEdits', 'method'=>'GET')) }}
{{-- Form::hidden('view_variables_array',$parm2) --}}
{{ Form::hidden('encoded_method_parameters_string', $encoded_method_parameters_string) }}


@section('promo') }}
<section id="promo">     
	<div id="promo-details-identity"> 

	programmersUtilitiesMenu

 	</div> 
 		<div id="promo-details"> 
		{{-- HTML::image('img/Alfa120pct.JPG', '69 myalfa',array('height'=>'272px')) --}} 
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


		   		<?php	
		   		// We're adding a little functionality without having to define a new route each time
		   		// we just make one of the original fields an array and pass anything we need
		   		//var_dump($a2_dimensional_array);
		   		//var_dump($parm2_array);exit("exit programmerUtilitiesMenu 64"); 
		   		//exit("exit programmerUtilitiesMenu 62"); 
				//echo($name.'*'.$link);exit("programmerUtilitiesMenu 62"); 

		   		?>
		   	@foreach($menu_array as $name=>$method)
				<li>
			   		<?php
			   		/*	
			   		$a = array('a'=>'0',
			   			'b'=>'1',
			   			'c'=>'2',
			   			);
			   		$a = "abcdef";
			   		$a = json_encode($a);
			   		'parm2'=>"'a','b','c','d'"

			   		*/
			   		//$parm1= array('a','b','c','d');
			   		//$parm1['parm1'] = 'parm1';
			   		//$parm2 = json_encode($parm1);
			   		//$parm2 = json_encode($parm2);
			   		//var_dump($parm1);
			   		//$parm2 =list('a,b,c,d');
			   		?>
			   		<a href="{{ URL::route(
			   		'programmerUtilities.'.$method, [
				   		'parm1'=>$name,
			   			'parm2'=>$parm2_array
			   			]
					) }}" class="btn mycart-btn-row2">{{$name}}</a>
			   	</li>
		   	@endforeach
		</ul>
	</div>
</div>

</nav>
    
</div><!-- end user-menu -->
	{{ Form::close() }}
@stop