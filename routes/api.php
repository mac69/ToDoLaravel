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

Route::group(['middleware' => 'cors'], function() {
    Route::get('tasklist', 'ToDoController@index');
    Route::post('tasklist/create', 'ToDoController@store');
    Route::post('tasklist/updatename', 'ToDoController@updateName');
    Route::post('tasklist/updatestatus', 'ToDoController@updateStatus');
    Route::post('tasklist/delete', 'ToDoController@destroy');
});
