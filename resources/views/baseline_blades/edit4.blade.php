@extends('layouts.main')

@section('promo')

<section id="promo">     
	<div id="promo-details"> 
		{{ HTML::image('img/72ferrari246.jpg', '72 ferrari dino',array('height'=>'272px'))}} 
		</div> <!-- end promo-details -->
</section><!-- promo -->
@stop

@section('content')

	<?php 
		//echo 'edit4';exit("exit5");
		//$column_names_array = json_decode($encoded_column_names_array);
		//print_r($encoded_column_names_array);exit("exit add1 blade");
		//$t1_array = array();
		//$t1_array = array('id'=>'id','tasks_index'=>'tasks_index','show_volunteer_link'=>'show_volunteer_link');
		//print_r($column_names_array);//exit("exit add1 blade");
		//print_r($t1_array);exit("exit add1 blade");
	?>
	<div id="admin">
		
  <!doctype html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>Move from one select box to another</title>
    <style type="text/css">
    select {
        width: 200px;
        float: left;
    }
    .controls {
        width: 40px;
        float: left;
        margin: 10px;
    }
    .controls a {
        background-color: #222222;
        border-radius: 4px;
        border: 2px solid #000;
        color: #ffffff;
        padding: 2px;
        font-size: 14px;
        text-decoration: none;
        display: inline-block;
        text-align: center;
        margin: 5px;
        width: 20px;
    }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js">
    </script>
    <script>
    function moveAll(from, to) {
        $('#'+from+' option').remove().appendTo('#'+to); 
    }
    
    function moveSelected(from, to) {
        $('#'+from+' option:selected').remove().appendTo('#'+to); 
    }
    </script>
    </head>
    
    <body>
 
    {{ Form::select('active_for_current_show',$from_array,array(),array('multiple','size'=>15,'id'=>'from')) }}
    
     <div class="controls"> 
        <a href="javascript:moveAll('from', 'to')">&gt;&gt;</a> 
        <a href="javascript:moveSelected('from', 'to')">&gt;</a> 
        <a href="javascript:moveSelected('to', 'from')">&lt;</a> 
        <a href="javascript:moveAll('to', 'from')" href="#">&lt;&lt;</a> 
    </div>
    
    {{ Form::select('to',$to_array,array(),array('multiple','size'=>15,'id'=>'to')) }}
    
    </body>
    </html>
	</div> <!-- end admin -->


@stop
</body>