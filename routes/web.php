<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|

*/
// ** this is what's working in l5_larablues

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    })->middleware('guest');

         Route::auth();

    //Route::controller('users','UsersController');

    // ***************************
    // This one gets you started!!

    Route::get('/', array('uses'=>'MainController@getIndex'))->name('Main.getIndex'); 
    
    // ***************************

    // main begin_generated_node
    $node_name = 'main';
    $controller_name = 'MainController';
    Route::get('admin/'.$node_name.'/programmerUtilities'      ,$controller_name.'@programmerUtilities');


    //Route::group(array('prefix' => 'admin'), function() {
    //    $node_name              = 'artist';
    //    $controller_name        = 'ArtistController';
    //    Route::resource($node_name,$controller_name);
    //});
   
    //***********************
    // DONT MOVE OR CHANGE THE FILLOWING LINE
    //generated_inserts_begin_here
	
	
	@include('/home/vagrant/Code/l5_larablues2/routes/generated/maillist.php');
	@include('/home/vagrant/Code/l5_larablues2/routes/generated/miscThings.php');
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	@include('/home/vagrant/Code/l5_larablues2/routes/generated/users.php');
	@include('/home/vagrant/Code/l5_larablues2/routes/generated/users_blues.php');
	
	
	@include('/home/vagrant/Code/l5_larablues2/routes/generated/new_show.php');
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	@include('/home/vagrant/Code/l5_larablues2/routes/miscThings.php');
	



    
    //generated_inserts_stop
    //***********************
      
    //
    //
    //@include('/home/vagrant/Code/l5_larablues2/routes/generated/volunteers.php');

/*
    Route::group(array('prefix' => 'admin'), function() {
        $node_name              = 'miscThings';
        $controller_name        = 'MiscThingsController';
        Route::resource($node_name,$controller_name);
    }

    );
*/

    @include('/home/vagrant/Code/l5_larablues2/routes/programmerUtilities.php');

    
    // *****
    // miscThingController NOT miscThings
    // *****
    // *****
    // these are common to all the routes that follow for this controller
    $node_name              = 'MiscThing';
    $model                  = 'miscThing';
    $controller_name        = 'MiscThingController';
    $what_we_are_doing      = "what_we_are_doing"; // assigned elsewhere but needs to be defined here
    $coming_from            = "coming_from"; // assigned elsewhere but needs to be defined here
    $reportDefinitionKey    = "reportDefinitionKey"; // assigned elsewhere but needs to be defined here

    //*
    $method_name            = "store";
    Route::POST($node_name.'/'.$method_name, 
    array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name); 
    //*
    $method_name            = "create_w_report_id";
    Route::POST($node_name
    .'/{'.$reportDefinitionKey.'}'
    .'/'.$method_name, 
    array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name); 



    });  // all part of middleware - web


 


