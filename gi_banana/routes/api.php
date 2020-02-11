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

Route::get('/departments', 'Department@index');
Route::get('/departments/{id}', 'Department@show');
Route::post('/departments', 'Department@create');
Route::delete('/departments/{id}', 'Department@destroy');
Route::put('/departments/{id}', 'Department@edit');

Route::get('/cdl', 'Cdl@index');
Route::get('/cdl/{id}/poi', 'Cdl@getpoi');
Route::get('/cdl/{id}/poi/search/{query}', 'Cdl@searchpoi');
Route::get('/cdl/{id}', 'Cdl@show');
Route::post('/cdl', 'Cdl@create');
Route::delete('/cdl/{id}', 'Cdl@destroy');
Route::put('/cdl/{id}', 'Cdl@edit');

Route::get('/logaction', 'Logaction@index');
Route::get('/logaction/{id}', 'Logaction@show');
Route::post('/logaction', 'Logaction@create');
Route::delete('/logaction/{id}', 'Logaction@destroy');
Route::put('/logaction/{id}', 'Logaction@edit');

Route::get('/poi', 'Poi@index');
Route::get('/poi/search/{query}', 'Poi@search');
Route::get('/poi/{id}', 'Poi@show');
Route::post('/poi', 'Poi@create');
Route::delete('/poi/{id}', 'Poi@destroy');
Route::put('/poi/{id}', 'Poi@edit');

Route::get('/service', 'Service@index');
Route::get('/service/{id}', 'Service@show');
Route::post('/service', 'Service@create');
Route::delete('/service/{id}', 'Service@destroy');
Route::put('/service/{id}', 'Service@edit');

Route::get('/user', 'User@index');
Route::get('/user/authentication', 'User@authentication');
Route::get('/user/{id}', 'User@show');
Route::post('/user', 'User@create');
Route::delete('/user/{id}', 'User@destroy');
Route::put('/user/{id}', 'User@edit');

Route::get('/group', 'Group@index');
Route::get('/group/{id}', 'Group@show');
Route::post('/group', 'Group@create');
Route::delete('/group/{id}', 'Group@destroy');
Route::put('/group/{id}', 'Group@edit');

Route::get('/cdlpoi', 'CdlPoi@index');
Route::get('/cdlpoi/{id}', 'CdlPoi@show');
Route::post('/cdlpoi', 'CdlPoi@create');
Route::delete('/cdlpoi/{id}', 'CdlPoi@destroy');
Route::put('/cdlpoi/{id}', 'CdlPoi@edit');

