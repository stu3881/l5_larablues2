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

    // *****
    // these are common to all the routes that follow for this controller
    // *****
    $node_name              = 'miscThings';
    $model                  = 'MiscThing';
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
    $method_name            = "activateDeactivate";
    Route::get('admin/'.$node_name
        .'/{'.$model.'}'
        .'/{'.$what_we_are_doing.'}'
        .'/{'.$coming_from.'}'
        .'/'.$method_name, 
        array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name); 
     //*
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

    $method_name            = "update";
    Route::PUT('admin/'.$node_name.'/{'.$model.'}'.'/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name);   

     //*
    $method_name            = "ppvEdit";
    Route::get('admin/'.$node_name.'/{'.$model.'}'.'/{'.$what_we_are_doing.'}'.'/{'.$coming_from.'}'.'/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name); 
     //*
    $method_name            = "reportDefEdits";
    Route::get('admin/'.$node_name.'/{'.$model.'}/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name);   
     //*
    $method_name            = "reportDefMenuEdit";
    Route::GET('admin/'.$node_name.'/{'.$model.'}'.'/{'.$what_we_are_doing.'}'.'/{'.$coming_from.'}'.'/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name); 
     //*
    $method_name            = "create";
    Route::get('admin/'.$node_name.'/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name); 
     //*
    $method_name            = "create_w_report_id";
    Route::get('admin/'.$node_name.'/{'.$reportDefinitionKey.'}'.'/'.$method_name, 
        array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name); 

    $method_name            = "delete";
    Route::get('admin/'.$node_name.'/{'.$model.'}'.'/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name);   

    $method_name            = "destroy";
    Route::get('admin/'.$node_name.'/{'.$model.'}'.'/'.$method_name, array('uses'=>$controller_name.'@'.$method_name))->name($node_name .'.'.$method_name);   

