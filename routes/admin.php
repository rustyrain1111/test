<?php

Route::get('/', 'Admin\BaseController@index')->name('admin');

Route::get('/test', 'Admin\BaseController@index')->name('admin.test');

// Action's with users.
Route::get('users', 'Admin\BaseController@getUsers')->name('admin.users');
Route::delete('deleteUser/{id}', 'Admin\BaseController@deleteUser')
	->name('admin.delete.user');
Route::patch('restoreUser/{id}', 'Admin\BaseController@restoreUser')
	->name('admin.restore.user');
