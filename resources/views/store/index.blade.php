@extends('layouts.main')

@section('promo_original')
	<section id="promo"> 
  		<div id="promo-details"> 
 		 <h1>Today's Deals</h1> 
              <p>Checkout this section of<br /> 
               products at a discounted price.</p> 
              <a href="#" class="default-btn">Shop Now</a> 
        
         {{ HTML::image('img/promo.png', 'Promotional Ad')}} 
          
        </div> <!-- end promo-details -->
        </section><!-- promo -->
@stop

@section('promo')

<section id="promo">     
	<div id="promo-details"> 
		{{ HTML::image('img/sbbsnavlogo.gif', 'SBBS logo')}} 
	</div> <!-- end promo-details -->
</section><!-- promo -->
@stop

@section('content')
<div id="user-menu" >

    @if(Auth::check())
        <nav class="dropdown">
            <ul>
                <li>
                    <a href="#">{{ HTML::image('img/user-icon.gif', Auth::user()->firstname) }} {{ Auth::user()->firstname }} {{ HTML::image('img/down-arrow.gif', Auth::user()->firstname) }}</a>
                    <ul>
                        @if(Auth::user()->admin == 1)
                        <li>{{ HTML::link('admin/tasks', 'Manage tasks') }}</li>
                        <li>{{ HTML::link('admin/volunteers', 'Manage Volunteers') }}</li>
                        <li>{{ HTML::link('admin/new_show', 'Manage Show') }}</li>
                        <li>{{ HTML::link('admin/assignments', 'Manage Volunteer assignments for current show') }}</li>
                        <li>{{ HTML::link('admin/categories', 'Manage Categories') }}</li>
                        <li>{{ HTML::link('admin/products', 'Manage Products') }}</li>
                        	
                        @endif
                        <li>{{ HTML::link('users/signout', 'Sign Out') }}</li>
                    </ul>
                </li>
            </ul>
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

@section('content0')

	<h2>New Products</h2>
    <hr>
    <div id="products">
    	@foreach($products as $product)
        <div class="product">
            <a href="/store/view/{{ $product->id }}">
            	{{ HTML::image($product->image, $product->title, array('class'=>'feature', 'width'=>'240', 'height'=>'127')) }}
            </a>

            <h3><a href="/store/view/{{ $product->id }}">{{ $product->title }}</a></h3>

            <p>{{ $product->description }}</p>

            <h5>
            	Availability: 
            	<span class="{{ Availability::displayClass($product->availability) }}">
            		{{ Availability::display($product->availability) }}
            	</span>
            </h5>

            <p>
                {{ Form::open(array('url'=>'store/addtocart')) }}
                {{ Form::hidden('quantity', 1) }}
                {{ Form::hidden('id', $product->id) }}
                <button type="submit" class="cart-btn">
                    <span class="price">${{ $product->price }}</span> 
                    {{ HTML::image('img/white-cart.gif', 'Add to Cart') }} 
                    ADD TO CART
                </button>
                {{ Form::close() }}
            </p>
        </div>
        @endforeach
    </div><!-- end products -->

@stop