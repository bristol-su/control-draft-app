<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::namespace('Pages')->group(function() {
    Route::get('/group', 'GroupController@index');
    Route::get('/group/{control_group}', 'GroupController@show');

    Route::get('/position', 'PositionController@index');
    Route::get('/position/{control_position}', 'PositionController@show');

    Route::get('/role', 'RoleController@index');
    Route::get('/role/{control_role}', 'RoleController@show');

    Route::get('/user', 'UserController@index');

    Route::get('/tag-category', 'TagCategoryController@index');
    Route::get('/tag-category/group/{control_group_tag_category}', 'TagCategoryController@showGroup');
});
