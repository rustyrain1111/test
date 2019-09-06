<?php

use App\Http\Controllers\Admin\AnnouncementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('users')->group(function () {
    Route::resource('', 'UserController')
        ->only(['index', 'create', 'store'])
        ->names(['index'=>'user.index', 'create'=>'user.create', 'store'=>'user.store']);
    Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::put('/update/{id}', 'UserController@update')->name('user.update');
    Route::get('/destroy/{id}', 'UserController@destroy')->name('user.destroy');
    Route::get('/restore/{id}', 'UserController@restore')->name('user.restore');
    Route::get('/block/{id}', 'UserController@block')->name('user.block');
});

Route::get('announcement', 'AnnouncementController@newAnnouncement')->name('new.announcement');
