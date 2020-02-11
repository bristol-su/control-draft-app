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
});

Route::namespace('Pages\Tags')->group(function() {
    Route::get('/group-tag-category', 'GroupTagCategoryController@index');
    Route::get('/group-tag-category/{control_group_tag_category}', 'GroupTagCategoryController@show');

    Route::get('/position-tag-category', 'PositionTagCategoryController@index');
    Route::get('/position-tag-category/{control_position_tag_category}', 'PositionTagCategoryController@show');

    Route::get('/role-tag-category', 'RoleTagCategoryController@index');
    Route::get('/role-tag-category/{control_role_tag_category}', 'RoleTagCategoryController@show');

    Route::get('/user-tag-category', 'UserTagCategoryController@index');
    Route::get('/user-tag-category/{control_user_tag_category}', 'UserTagCategoryController@show');
});