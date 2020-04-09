<?php

Route::get('/','SiswaController@login')->name('login');
Route::get('/logout','SiswaController@logout');
Route::get('siswa/{id}/nilai','SiswaController@nilai');
Route::post('siswa/auth','SiswaController@auth');

Route::group(['middleware' => 'auth' ], function(){
	Route::resource('siswa','SiswaController');
});