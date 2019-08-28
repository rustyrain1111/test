<?php

use Illuminate\Support\Facades\Route;


Route::resource('admin', 'AdminController')
    ->only(['index', 'create', 'store', 'edit', 'update']);
Route::get('admin/destroy/{id}', 'AdminController@destroy')->name('admin.destroy');
Route::get('admin/block/{id}', 'AdminController@block')->name('admin.block');
