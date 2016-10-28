@extends('layouts.main')
@section('promo')

<section id="promo">     
	<div id="promo-details"> 
		{{ HTML::image('img/sbbsnavlogo.gif', 'SBBS logo')}} 
	</div> <!-- end promo-details -->
</section><!-- promo -->
@stop

@section('content')
<?php //var_dump($tasks); ?>
<div id="admin" width="100%">
<div id="div0_main">

<div align="center"><br>
	this is t1
	<p>
	{{ Form::open(array('url'=>'admin/main', 'method'=>'GET','class'=>'form-inline')) }}
	{{ Form::submit('Main menu', array('class'=>'cart-btn')) }}
	{{ Form::close() }}
	
	{{ Form::open(array('url'=>'admin/'.$this->model_table.'/updatevolunteers', 'method'=>'PUT','class'=>'form-inline')) }}
	{{ Form::hidden('id',Input::get('id')) }}
	<p>		
	{{ Form::submit('Update Volunteer Assignments') }}
		
	<table>
	<?php 
	$maillist_index = array();
	$oldkey = array();
	//$tasks_index = array();
	//$task_volunteer_link = array();
	$rowcount = -1;
	?>
	@foreach($tasks as $task)
		<?php $rowcount ++;	
		$maillistx = 'maillist_index' . $rowcount; 
		$id = 'id' . $rowcount; 
		?>
		{{ Form::hidden('id',Input::get('id')) }}
		{{ Form::hidden($maillistx,$task[$maillistx]) }}
		{{-- Form::hidden('task_id',$task["task_id"]) --}}

		{{ Form::hidden($id,$task[$id]) }}
		<?php
		//var_dump($task); exit("t1 46 exit");
		if ($task['assigned_status']) {
			$stylex = "style='background-color:DarkSalmon;'"; 
			}
		else{
			$stylex = "style='background-color:LightBlue;'";
			} 
		$row = 
			"<tr>".  
			"<td ".$stylex .">".
				$task['TaskName1'] ." </td>".
			"<td>".$task['select_box'].  "</td>".  
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