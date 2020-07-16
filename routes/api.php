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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// localhost:8000/api/v1/activities = List all activities [POST, GET, PATCH, DELETE]
// localhost:8000/api/v1/activities/id/items = List all items under activity [POST, GET, PATCH, DELETE]

Route::prefix('/v1')->group(function () {
    Route::post('activities', 'ActivitiesController@store');
    Route::post('activities/{activity_id}/items', 'ActivitiesController@storeLists');
    
    Route::get('activities', 'ActivitiesController@show');
    Route::get('activities/{activity_id}', 'ActivitiesController@getActivityById');
    
    Route::patch('activities/{activity_id}', 'ActivitiesController@activityUpdate');
    Route::patch('activities/{activity_id}/items/{item_id}', 'ActivitiesController@itemUpdate');

    Route::delete('activities/{activity_id}', 'ActivitiesController@activityDestroy');
    Route::delete('activities/{activity_id}/items/{item_id}', 'ActivitiesController@activityItemDestroy');
});
