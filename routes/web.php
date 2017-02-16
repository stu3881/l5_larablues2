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

   // Route::controller('users','UsersController');

    // This one gets you started!!
    Route::get('/', array('uses'=>'MainController@getIndex'));

   // main begin_generated_node
    $node_name = 'main';
    $controller_name = 'MainController';
    Route::get('admin/'.$node_name.'/edit6'     ,$controller_name.'@getEdit6');
    Route::get('admin/'.$node_name.'/programmerUtilities'      ,$controller_name.'@programmerUtilities');
/*    Route::controller('admin/main','MainController');
    Route::controller($node_name                ,$controller_name);
    Route::controller('admin/'.$node_name       ,$controller_name);
    Route::get('admin/'.$node_name.'/add'       ,$controller_name.'@getAdd');
    Route::get('admin/'.$node_name.'/edit'      ,$controller_name.'@getEdit');
    Route::put('admin/'.$node_name.'/edit1'     ,$controller_name.'@putEdit1');
    Route::get('admin/'.$node_name.'/edit2'     ,$controller_name.'@getEdit2');
    Route::put('admin/'.$node_name.'/edit2new'  ,$controller_name.'@putEdit2new');
    Route::put('admin/'.$node_name.'/edit3'     ,$controller_name.'@putEdit3');
    Route::put('admin/'.$node_name.'/edit4'     ,$controller_name.'@putEdit4');
    Route::put('admin/'.$node_name.'/edit41'    ,$controller_name.'@putEdit41');
    Route::put('admin/'.$node_name.'/edit5'     ,$controller_name.'@putEdit5');

    Route::get('admin/'.$node_name.'/edit8'     ,$controller_name.'@getEdit8');
   // main end_generated_node
*/


// ** this is what's now
/*
    Route::get('/', array('uses'=>'MainController@getIndex'));

    Route::resource('books','BookController');
    //Route::resource('miscThings','MiscThingController');   
    
    Route::group(array('prefix' => 'admin'), function() {
        $node_name              = 'main';
        $controller_name        = 'MainController';
        Route::resource($node_name,$controller_name);
    });
*/

     
    Route::group(array('prefix' => 'admin'), function() {
        $node_name              = 'miscThings';
        $controller_name        = 'MiscThingsController';
        Route::resource($node_name,$controller_name);
    });

    // *****
    // these are common to all the routes that follow for this controller
    // *****
    $node_name              = 'miscThings';
    $model                  = 'miscThing';
    $controller_name        = 'MiscThingsController';
    $what_we_are_doing      = "what_we_are_doing"; // assigned elsewhere but needs to be defined here
    $coming_from            = "coming_from"; // assigned elsewhere but needs to be defined here
    $reportDefinitionKey    = "reportDefinitionKey"; // assigned elsewhere but needs to be defined here

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
    $method_name            = "indexReportsx";
    Route::get('admin/'.$node_name.'/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name);   
     //*
    $method_name            = "indexReports";
    Route::get('admin/'.$node_name.'/{'.$model.'}/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name);   
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
 
    });


 


