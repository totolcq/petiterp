<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
Route::prefix('1.0')->group(function(){
    Route::get('/ping', [
        'uses' => '\App\Http\Controllers\Api\v1a\PingController@ping',
        'as' => 'test.ping'
    ]);
    Route::apiResource('projects', 'Api\v1a\ProjectController');
    Route::post('/projects/{id}/archive', [
        'uses' => '\App\Http\Controllers\Api\v1a\ProjectController@setArchived',
        'as' => 'projects.archive'
    ]);
});

Route::fallback(function(){
    return response()->json([
        'message' => 'No entry API for this url'], 404);
});
