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
   Route::get('/', function () {
        return view('welcome');
    })->middleware('guest');
*/
    Route::get('/', array('uses'=>'MainController@getIndex'));
    /*
    Route::get('/', function () {
        return view('welcome');
    })->middleware('guest');
    */
    Route::auth();
Route::resource('books','BookController');
Route::resource('miscThings','MiscThingController');
/*
Route::group(array('prefix' => 'api'), function() {
    //Route::resource('books','BookController');
});
*/
 // Route::controller('users','UsersController');
// is part of the original larablues routes

//    Route::get('/', array('uses'=>'MainController@getIndex'));

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

/*

    // miscThings begin_generated_node
    $node_name                                  = 'miscThings';
    $controller_name                            = 'MiscThingsController';
    
    Route::controller($node_name                ,$controller_name);
    Route::controller('admin/'.$node_name       ,$controller_name);
    Route::get('admin/'.$node_name.'/add'       ,$controller_name.'@getAdd');
    //Route::get('admin/'.$node_name.'/getRptsx'  ,$controller_name.'@getRptsx');
    Route::get('admin/'.$node_name.'/edit'      ,$controller_name.'@getEdit');
    Route::put('admin/'.$node_name.'/edit1'     ,$controller_name.'@putEdit1');

    Route::get('admin/'.$node_name.'/tasks'     ,$controller_name.'@index');
    Route::post('admin/'.$node_name.'/createmt'     ,$controller_name.'@createmt');
    Route::delete('admin/'.$node_name.'/task/{task}',$controller_name.'@destroy');

    Route::get('admin/'.$node_name.'/edit2'     ,$controller_name.'@getEdit2');
    Route::post('admin/'.$node_name.'/edit2new'  ,$controller_name.'@Edit2new');
    Route::put('admin/'.$node_name.'/update'    ,$controller_name.'@putUpdate');

    Route::put('admin/'.$node_name.'/edit4'     ,$controller_name.'@putEdit4');
    Route::put('admin/'.$node_name.'/edit5'     ,$controller_name.'@putEdit5');
    Route::get('admin/'.$node_name.'/edit6'     ,$controller_name.'@getEdit6');
    Route::get('admin/'.$node_name.'/edit8'     ,$controller_name.'@getEdit8');
  */  

/* laravel's default welcome
Route::get('/', function () {
    return view('welcome');
});
*/


