<?php

Route::group(
    [
        'prefix'=>'admin','middleware' => ['auth','admin']
    ],
    function(){
        Route::get('/', 'Admin\DashboardController@index')->name('admin');
        Route::resource('/berita','Admin\BeritaController');
        Route::resource('/kategori','Admin\KategoriController');
        Route::resource('/user','Admin\UserController');
});