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


    Route::group(array('prefix' => 'admin'), function() {
        $node_name              = 'artist';
        $controller_name        = 'ArtistController';
        Route::resource($node_name,$controller_name);
    });
   
    //***********************
    // DONT MOVE OR CHANGE THE FILLOWING LINE
    //generated_inserts_begin_here
	@include('/home/vagrant/Code/l5_larablues2/routes/generated/#beginNodeName#endNodeName.php');
	@include('/home/vagrant/Code/l5_larablues2/routes/generated/miscThings.php');
	@include('/home/vagrant/Code/l5_larablues2/routes/generated/tasks_blues.php');
	@include('/home/vagrant/Code/l5_larablues2/routes/generated/categories.php');

	@include('/home/vagrant/Code/l5_larablues2/routes/administratorsGeneratedRoutes.php');

    
    //generated_inserts_stop
    //***********************
    //$node_name = 'artist';$model = 'artist';$controller_name = 'ArtistController';   
    //@include('myweb.miscThingsRoutesModel.php');
    @include('/home/vagrant/Code/l5_larablues2/routes/generated/artist.php');
    @include('/home/vagrant/Code/l5_larablues2/routes/generated/new_showGeneratedRoutes.php');
    //$node_name = 'new_show';$model = 'New_show';$controller_name = 'New_showController';   
    //@include('myweb.miscThingsRoutesModel.php');
    @include('/home/vagrant/Code/l5_larablues2/routes/generated/volunteersGeneratedRoutes.php');
  //  //$node_name = 'volunteers';$model = 'Volunteer';$controller_name = 'VolunteersController';   
    //@include('myweb.miscThingsRoutesModel.php');

    Route::group(array('prefix' => 'admin'), function() {
        $node_name              = 'miscThings';
        $controller_name        = 'MiscThingsController';
        Route::resource($node_name,$controller_name);
    });
    @include('/home/vagrant/Code/l5_larablues2/routes/generated/miscThingsGeneratedRoutes.php');
    @include('myweb_programmerUtilities.php');

    
    @include('miscThingsGeneratedRoutes.php');


    // *****
    // these are common to all the routes that follow for this controller
    // *****
    /*
    $node_name              = 'miscThings';
    $model                  = 'miscThing';
    $controller_name        = 'MiscThingsController';




    $what_we_are_doing      = "what_we_are_doing"; // needs to be defined here
    $coming_from            = "coming_from";  // needs to be defined here
    $reportDefinitionKey    = "reportDefinitionKey";// needs to be defined here
    $encoded_business_rules = "encoded_business_rules"; // needs to be defined here
    $modifiable_fields_array = 'modifiable_fields_array';
    //*
    $method_name            = "stor_w_rules_array";
    Route::POST('admin/'.$node_name
        //.'/{'.$encoded_business_rules.'}'
        //.'/{'.$modifiable_fields_array.'}'
        .'/'.$method_name,
        array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name); 
    //*
    $method_name            = "browseEdit";
    Route::get('admin/'.$node_name
        .'/{'.$model.'}'
        .'/{'.$what_we_are_doing.'}'
        .'/{'.$coming_from.'}'
        .'/'.$method_name, 
        array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name); 
     //*
    $method_name            = "editUpdate";
    Route::get('admin/'.$node_name
        .'/{'.$model.'}'
        .'/{'.$what_we_are_doing.'}'
        .'/{'.$coming_from.'}'
        .'/{'.$reportDefinitionKey.'}'
        .'/'.$method_name, 
        array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name); 
     //*
    $method_name            = "indexRecords";
    Route::get('admin/'.$node_name.'/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name);   
      //*
    $method_name            = "indexReports";
    Route::get('admin/'.$node_name.'/{'.$model.'}'.'/'.'{'.$reportDefinitionKey.'}'.'/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name);   
     //*
    $method_name            = "ppvEdit";
    Route::get('admin/'.$node_name.'/{'.$model.'}'.'/{'.$what_we_are_doing.'}'.'/{'.$coming_from.'}'.'/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name); 
     //*
    $method_name            = "reportDefEdits";
    Route::get('admin/'.$node_name.'/{'.$model.'}/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name);   
     //*
    $method_name            = "reportDefMenuEdit";
    Route::get('admin/'.$node_name.'/{'.$model.'}'.'/{'.$what_we_are_doing.'}'.'/{'.$coming_from.'}'.'/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name); 
     //*
    $method_name            = "create";
    Route::get('admin/'.$node_name.'/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name); 
     //*
    $method_name            = "create_w_report_id";
    Route::get('admin/'.$node_name.'/{'.$reportDefinitionKey.'}'.'/'.$method_name, 
        array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name); 
*/

// *****
// miscThingController NOT miscThings
// *****
// *****
// these are common to all the routes that follow for this controller
// *****

$node_name              = 'MiscThing';
$model                  = 'miscThing';
$controller_name        = 'MiscThingController';
$what_we_are_doing      = "what_we_are_doing"; // assigned elsewhere but needs to be defined here
$coming_from            = "coming_from"; // assigned elsewhere but needs to be defined here
$reportDefinitionKey    = "reportDefinitionKey"; // assigned elsewhere but needs to be defined here

//*
$method_name            = "store";
Route::POST($node_name
    .'/'.$method_name, 
    array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name); 


     //*
    $method_name            = "create_w_report_id";
    Route::POST($node_name
    .'/{'.$reportDefinitionKey.'}'
    .'/'.$method_name, 
    array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name); 



    });  // all part of middleware - web


 


