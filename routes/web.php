<?php

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::group(
    [
        'previx'=>'apps','middleware'=>['auth','user']
    ],
    function(){
        Route::get('/apps', 'Apps\DashboardController@index')->name('apps');
});

