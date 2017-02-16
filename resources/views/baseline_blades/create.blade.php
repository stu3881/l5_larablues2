@extends('../layouts/main')
@section('promo')

<section id="promo">   
	create  
	<div id="promo-details"> 

		{{ HTML::image('/img/Alfa120pct.JPG', '69 myalfa',array('width'=>'72px'))}} 


		</div> <!-- end promo-details -->
</section><!-- promo -->
@stop

@section('content')
    <h1>Create </h1>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif 

		<div id="div_inside_update_active_tasks" >	<!--div_inside_update_active_tasks -->
		
			<div id="div_inside_update_active_tasks_button_bar" >	<!-- div_inside_update_active_tasks_button_bar -->
				<table id="outer_tbl_0" class="table_inside_update_active_tasks">
				<tr class="table_no_lines">
				<td colspan="4">	
				<table id="inner_tbl_0_0" class="table_no_lines">
					<tr class="table_no_lines">
				

					<td class="table_no_lines">
						{{ Form::submit('Add') }}
						{{ Form::close() }}
					</td>
			
					<td class="table_no_lines">
						{{ Form::open(array('url'=>'admin/'.$node_name, 'method'=>'GET')) }}
						{{ Form::submit('back to Reports menu') }}
						{{ Form::close() }}


					</td>

	
	
					<td class="table_no_lines">
						{{ Form::open(array('url'=>'admin/main', 'method'=>'GET')) }}
						{{ Form::submit('Main menu' ) }}
						{{ Form::close() }}
					</td>
		</div>		
	@include($snippet_file)    


@stop
