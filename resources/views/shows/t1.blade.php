@extends('layouts.main')
@section('promo')

<section id="promo">     
	<div id="promo-details"> 
		{{ HTML::image('img/sbbsnavlogo.gif', 'SBBS logo')}} 
	</div> <!-- end promo-details -->
</section><!-- promo -->
@stop

@section('content')
<?php //var_dump($shows); ?>
<div id="admin" width="100%">
<div id="add_new_rec_div">

<div align="center"><br>
	this is t1
	<p>
	{{ Form::open(array('url'=>'admin/main', 'method'=>'GET','class'=>'form-inline')) }}
	{{ Form::submit('Main menu', array('class'=>'cart-btn')) }}
	{{ Form::close() }}
	
	{{ Form::open(array('url'=>'admin/shows/updatevolunteers', 'method'=>'PUT','class'=>'form-inline')) }}
	{{ Form::hidden('id',Input::get('id')) }}
	<p>		
	{{ Form::submit('Update Volunteer Assignments') }}
		
	<table>
	<?php 
	$maillist_index = array();
	$oldkey = array();
	//$tasks_index = array();
	//$show_volunteer_link = array();
	$rowcount = -1;
	?>
	@foreach($shows as $show)
		<?php $rowcount ++;	
		$maillistx = 'maillist_index' . $rowcount; 
		$id = 'id' . $rowcount; 
		?>
		{{ Form::hidden('id',Input::get('id')) }}
		{{ Form::hidden($maillistx,$show[$maillistx]) }}
		{{-- Form::hidden('show_id',$show["show_id"]) --}}

		{{ Form::hidden($id,$show[$id]) }}
		<?php
		//var_dump($show); exit("t1 46 exit");
		if ($show['assigned_status']) {
			$stylex = "style='background-color:DarkSalmon;'"; 
			}
		else{
			$stylex = "style='background-color:LightBlue;'";
			} 
		$row = 
			"<tr>".  
			"<td ".$stylex .">".
				$show['TaskName1'] ." </td>".
			"<td>".$show['select_box'].  "</td>".  
			"</tr>";
		echo $row;
		?>
	@endforeach
	</table>
	</td></tr>
	</table>
	
	<p>		
	{{ Form::submit('Update Volunteer Assignments') }}
	{{ Form::close() }}
	
	{{ Form::open(array('url'=>'admin/main', 'method'=>'GET','class'=>'form-inline')) }}
	{{ Form::submit('Main menu', array('class'=>'cart-btn')) }}
	{{ Form::close() }}
	
	</div> <!-- end admin -->
	 	
@stop
</body>