<?php

Route::get('/', 'Admin\IndexController@index');
Route::resource('/role', 'Admin\RoleController');
Route::resource('/permission', 'Admin\PermissionController');
