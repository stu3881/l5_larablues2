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

Route::get('/', function () {
    return view('examplewelcome');
});
Route::resource('books','BookController');
Route::resource('miscThings','MiscThingController');

Route::group(array('prefix' => 'api'), function() {
    //Route::resource('books','BookController');
});
//Route:resource('exampleRest', 'ExampleResourceController');

/*
Route::get('/show', 'ExampleController@show');

Route::get('/we', function () {
    return view('welcome');
});
Route::get('/fy', function () {
    return 'fuck you';
});
Route::get('/e1', function () {
    return view('edit1');
});

Route::get('user/{id}', function ($id) {
    return 'User '.$id;
});


Route::get('user/{name?}', function ($name = 'John') {
    return $name;
});
Route::get('user/profile', function () {
    //
})->name('profile');

    Route::get('sample-restful-apis', function()
    {
        return array(
          1 => "expertphp",
          2 => "demo"
        );
    });
*/
