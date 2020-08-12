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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware(['auth:sanctum'])->group(function () {
 	 //users routes
	Route::resource('users','UserController');
	Route::delete('users/{user}/forcedelete','UserController@forcedelete');
	Route::delete('users/{user}/restore','UserController@restore');

	//roles routes
	Route::resource('roles','RoleController');
	Route::delete('roles/{role}/forcedelete','RoleController@forcedelete');
	Route::delete('roles/{role}/restore','RoleController@restore');

	//permissions routes
	Route::resource('permissions','PermissionController');
	Route::delete('permission/{permission}/forcedelete','PermissionController@forcedelete');
	Route::delete('permission/{permission}/restore','PermissionController@restore');

});