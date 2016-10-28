@extends('layouts.main')

@section('content')
	<div id="admin" width="100%">

<?php var_dump($_REQUEST);?>	
<?php  var_dump(Input::all());?>	
this is t2
<div id="add_new_rec_div">

<div align="center"><br>
		{{ Form::open(array('url'=>'admin/shows/updatevolunteers', 'method'=>'PUT','class'=>'form-inline')) }}
		{{ Form::hidden('id',Input::get('id')) }}
		<p>		
		{{ Form::submit('Update Volunteer Assignments') }}
		{{ Form::close() }}
		
		{{ Form::open(array('url'=>'admin/main', 'method'=>'GET','class'=>'form-inline')) }}
		{{ Form::submit('Main menu', array('class'=>'cart-btn')) }}
		{{ Form::close() }}
	
</div>	

<div align="center">
	</p>
		{{ Form::open(array('url'=>'admin/shows/putUpdateTA', 'method'=>'PUT','class'=>'form-inline')) }}
		{{ Form::hidden('id',Input::get('id')) }}
		<p>		
		{{ Form::submit('Update category') }}
		{{ Form::close() }}
		
		{{ Form::open(array('url'=>'admin/main', 'method'=>'GET','class'=>'form-inline')) }}
		{{ Form::submit('Main menu', array('class'=>'cart-btn')) }}
		{{ Form::close() }}
	


</div> <!-- end admin -->
	 
	
@stop
</body>