@extends('layouts.main')

@section('content')
<?php 
echo ('delete0');print_r($_REQUEST);exit('xit 4');

//print_r($active_statuses_array);
?>
<div id="admin" style="width:650px;height:200px">
	@if($errors->has())	
	<div id="form-errors">
		<p>The following errors have occurred:</p>
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error}}</li>
			@endforeach
		</ul>
	</div> 
	<!-- end form-errors -->			
	@endif
	
	</p>

	<div id="update_active_tasks" style="width:440px"><br>
		delete a task div
		<p>
		{{ Form::open(array('url'=>'admin/'.$this->node_name.'/destroy', 'method'=>'POST','class'=>'table_inside_update_active_tasks')) }}
		{{ Form::hidden('id',Input::get('id')) }}
		<p>		
		<div id="div_inside_update_active_tasks" >	
			<table id="outer_tbl_0" class="table_inside_update_active_tasks">
				<th></th>
				<tr class="table_no_lines">
				<td colspan="2">	
					<table id="inner_tbl_0_0" class="table_no_lines">
						<tr class="table_no_lines">
						<td class="table_no_lines">
							{{ Form::submit('Update Active Tasks') }}
							{{ Form::close() }}
						</td><td>	
							{{ Form::open(array('url'=>'admin/main', 'method'=>'GET')) }}
							{{ Form::submit('Main menu', array('class'=>'cart-btn')) }}
							{{ Form::close() }}
						</td><td>	
							
							{{ Form::open(array('url'=>'admin/'.$this->node_name, 'method'=>'GET')) }}
							{{ Form::submit('Tasks menu', array('class'=>'cart-btn')) }}
							{{ Form::close() }}
						</td></tr>
					</table>
				</td></tr>
		
				<?php 
					$rowcount = -1;
					$save_shift = "";
					$classradio = "class=\'bottom_buttons\'";
					//$current_show_volunteer_link = $this->set_current_show_volunteer_link();
						
						//print_r($one_for_one);			exit("exit66");
						?>
				</table>
				
		</div>   <!-- end div_inside_update_active_tasks -->				
	</div>   <!-- end update_active_tasks -->	
</div> <!-- end admin -->
	
	
@stop
