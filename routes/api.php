<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('tasks')->group(function () {

    Route::get('/', 'TaskController@index');
    Route::post('/', 'TaskController@store');
    Route::get('/{task}', 'TaskController@show');
    Route::put('/{task}', 'TaskController@update');
    Route::delete('/{task}', 'TaskController@destroy');
    Route::get('/id/{count}', 'TaskController@sortTasksById');
    Route::get('/category/{category_id}', 'TaskController@getTaskByCategoryId');

});
