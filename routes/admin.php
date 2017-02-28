<?php

Route::get('/', 'Admin\IndexController@index')->name('admin.index');
Route::resource('/role', 'Admin\RoleController');
Route::resource('/permission', 'Admin\PermissionController');
Route::resource('/user', 'Admin\UserController');
