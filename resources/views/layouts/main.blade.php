
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>This is larablues</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width">

<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
{{ HTML::style('css/normalize.css') }}
{{ HTML::style('css/main.css')}}
{{ HTML::style('css/sbblues2.css') }}

{{HTML::script('js/vendor/modernizr-2.6.2.min.js')}}

<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">

       
</head>
<body>
<!--  
[if lt IE 7]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
[endif]
-->

<div id="wrapper" style="background-color:#cecbe6">

<header>

</section>
  <!-- end action-bar -->

</header>

 
@yield('promo')        
<hr />

<section id="div0_main" class="clearfix" style="background-color:#cecbe6">
	@if (Session::has('message'))
		<p class='alert'>{{Session::get('message')}}</p>
	@endif
	@yield('hard_title')

	@yield('navigation_bar')   
	@yield('vertical_navigation_ul')   
	
	@yield('content')
</section>
	<!-- end main-content -->

<hr />
 @yield('pagination')

 
 <footer>
	<hr />
	<section>
		@yield('links')
		
		<hr />
		@yield('stuff_in_footer')
	</section>
</footer>
</div>



<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
	var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		g.src='//www.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
				
				</body>
				</html>
