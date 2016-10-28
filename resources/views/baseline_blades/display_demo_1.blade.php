@extends('layouts.main')
<?php 
//print_r(Input::all());//exit("xit index")?>

@section('promo')
<section id="promo">     
	<div id="promo-details"> 
		{{ HTML::image('img/72ferrari246.jpg', 'ferarri pic logo',array('height'=>'272px'))}} 
	</div> 
</section>
@stop

@section('content')
<div id="user-menu" >
	larablues_www
    @if(Auth::check())
    
			<nav class="dropdown">
				@section('vertical_navigation_ul')
					<div id="admin_nav_bar" style="width:500px">	
						<div id="admin_nav_bar_center" style="width:400px;text-align:left;background-color:#F0E68C;">	
							<a href="#">{{ HTML::image('img/user-icon.gif', Auth::user()->firstname) }} {{ Auth::user()->firstname }} {{ HTML::image('img/down-arrow.gif', Auth::user()->firstname) }}</a>
							<ul>
								@if(Auth::user()->admin == 1)
									
								<li>
									{{ Form::open(array('url'=>'admin/main', 'method'=>'GET')) }}
									{{ Form::submit('main menu') }}
									{{ Form::close() }}
								</li>
								<!-- -->
								<!-- 
									<li>{{ HTML::link('admin/shows', 'Manage Shows and task assignments') }}</li>
									<li>{{ HTML::link('admin/tasks', 'Manage tasks') }}</li>
									<li>{{ HTML::link('nerds', 'Manage nerds') }}</li>
								-->
								 <li>
									{{ Form::open(array('url'=>'admin/miscThings', 'method'=>'GET')) }}
									{{ HTML::image('img/72wwwferrari246.jpg', ' img ferarri pic logo',array('height'=>'102px')) }} 
									{{-- Form::submit('Manage miscThings') --}}
									{{ Form::close() }}
								</li>
								 <li>
									{{ Form::open(array('url'=>'admin/miscThings', 'method'=>'GET')) }}
									{{ HTML::image('img/demo1/01_2015-05-21.jpg', ' 01_2015-05-21',array('height'=>'400px')) }} 
									some text
									{{ HTML::image('img/demo1/02 2015-05-21.jpg', ' 01_2015-05-21',array('height'=>'400px')) }} 
									some more
									{{ HTML::image('img/demo1/03 2015-05-21.jpg', ' 01_2015-05-21',array('height'=>'400px')) }} 
									even more

									{{-- Form::submit('Manage miscThings') --}}
									{{ Form::close() }}
								</li>

								
								<!-- 
								<li>
									{{ Form::open(array('url'=>'admin/tasks/edit4', 'method'=>'GET')) }}
									{{ Form::hidden('edit4_option','programmer_utilities_menu') }}
									{{ Form::submit('programmer utilities') }}
									{{ Form::close() }}
								</li>
								 -->								
								@endif
								<li>{{ HTML::link('users/signout', 'Sign Out') }}</li>
								</ul>
							</div>
					</div>
				@stop
			</nav>
    @else
        <nav id="signin" class="dropdown" class="products">
            <ul>
                <li>
                    <a href="#">{{ HTML::image('img/user-icon.gif', 'Sign In') }} Sign In {{ HTML::image('img/down-arrow.gif', 'Sign In') }}</a>
                    <ul>
                        <li>{{ HTML::link('users/signin', 'Sign In') }}</li>
                        <li>{{ HTML::link('users/newaccount', 'Sign Up') }}</li>
                    </ul>
                </li>
            </ul>
        </nav>
    @endif
    
</div><!-- end user-menu -->
@stop

