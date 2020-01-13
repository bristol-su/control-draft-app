<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')->group(function() {
    Route::namespace('Group')->group(function() {
        Route::apiResource('group', 'GroupController')->parameter('group', 'control_group');
        Route::apiResource('group.tag', 'GroupGroupTagController')->only(['index', 'update', 'destroy'])->parameters(['group' => 'control_group', 'tag' => 'control_group_tag']);
        Route::apiResource('group.user', 'GroupUserController')->only(['index', 'update', 'destroy'])->parameters(['group' => 'control_group', 'user' => 'control_user']);
        Route::apiResource('group.role', 'GroupRoleController')->only(['index', 'update'])->parameters(['group' => 'control_group', 'role' => 'control_role']);
    });

    Route::namespace('User')->group(function() {
        Route::apiResource('user', 'UserController')->parameter('user', 'control_user');
    });
});
