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
    Route::get('/', array('uses'=>'MainController@getIndex'));

    Route::resource('books','BookController');
    //Route::resource('miscThings','MiscThingController');   
    
    Route::group(array('prefix' => 'admin'), function() {
        $node_name              = 'main';
        $controller_name        = 'MainController';
        Route::resource($node_name,$controller_name);
    });


     
    Route::group(array('prefix' => 'admin'), function() {
        $node_name              = 'miscThings';
        $controller_name        = 'MiscThingsController';
        Route::resource($node_name,$controller_name);
    });
    $node_name              = 'miscThings';
    $model                  = 'miscThing';
    $controller_name        = 'MiscThingsController';
    $method_name            = "browseEdit";
    Route::get('admin/'.$node_name.'/{'.$model.'}/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name);

 
    $node_name              = 'miscThings';
    $model                  = 'miscThing';
    $controller_name        = 'MiscThingsController';
    $method_name            = "editUpdate";
    Route::get('admin/'.$node_name.'/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name);

    $node_name              = 'miscThings';
    $model                  = 'miscThing';
    $controller_name        = 'MiscThingsController';
    $method_name            = "indexRecords";
    Route::get('admin/'.$node_name.'/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name);   

    $node_name              = 'miscThings';
    $model                  = 'miscThing';
    $controller_name        = 'MiscThingsController';
    $method_name            = "indexReportsx";
    Route::get('admin/'.$node_name.'/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name);   

    $node_name              = 'miscThings';
    $model                  = 'miscThing';
    $controller_name        = 'MiscThingsController';
    $method_name            = "indexReports";
    Route::get('admin/'.$node_name.'/{'.$model.'}/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name);   
 
    $node_name              = 'miscThings';
    $model                  = 'miscThing';
    $controller_name        = 'MiscThingsController';
    $method_name            = "ppvEdit";
    $what_we_are_doing      = "reportDefMenuEdit"; // assigned elsewhere but needs to be defined here
    $coming_from            = "coming_from"; // assigned elsewhere but needs to be defined here
    Route::get('admin/'.$node_name.'/{'.$model.'}'.'/{'.$what_we_are_doing.'}'.'/{'.$coming_from.'}'.'/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name); 

   
    $node_name              = 'miscThings';
    $model                  = 'miscThing';
    $controller_name        = 'MiscThingsController';
    $method_name            = "reportDefEdits";
    Route::get('admin/'.$node_name.'/{'.$model.'}/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name);   

    $node_name              = 'miscThings';
    $model                  = 'miscThing';
    $controller_name        = 'MiscThingsController';
    $method_name            = "reportDefMenuEdit";
    $what_we_are_doing      = "what_we_are_doing"; // assigned elsewhere but needs to be defined here
    $coming_from            = "coming_from"; // assigned elsewhere but needs to be defined here
    Route::get('admin/'.$node_name.'/{'.$model.'}'.'/{'.$what_we_are_doing.'}'.'/{'.$coming_from.'}'.'/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name); 


    Route::auth();

/*
    Route::controller('admin/main','MainController');
    // main begin_generated_node
    $node_name = 'main';
    $controller_name = 'MainController';
    Route::controller($node_name                ,$controller_name);
    Route::controller('admin/'.$node_name       ,$controller_name);
    Route::get('admin/'.$node_name.'/add'       ,$controller_name.'@getAdd');
    //Route::get('admin/'.$node_name.'/getRptsx'  ,$controller_name.'@getRptsx');
    Route::get('admin/'.$node_name.'/edit'      ,$controller_name.'@getEdit');
    Route::put('admin/'.$node_name.'/edit1'     ,$controller_name.'@putEdit1');
    Route::get('admin/'.$node_name.'/edit2'     ,$controller_name.'@getEdit2');
    Route::put('admin/'.$node_name.'/edit2new'  ,$controller_name.'@putEdit2new');
    Route::put('admin/'.$node_name.'/edit3'     ,$controller_name.'@putEdit3');
    Route::put('admin/'.$node_name.'/edit4'     ,$controller_name.'@putEdit4');
    Route::put('admin/'.$node_name.'/edit41'     ,$controller_name.'@putEdit41');
    Route::put('admin/'.$node_name.'/edit5'     ,$controller_name.'@putEdit5');
    Route::get('admin/'.$node_name.'/edit6'     ,$controller_name.'@getEdit6');
    Route::get('admin/'.$node_name.'/edit8'     ,$controller_name.'@getEdit8');
*/




/* laravel's default welcome
Route::get('/', function () {
    return view('welcome');
});
*/


