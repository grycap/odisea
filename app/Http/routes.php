<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Deplegador

Route::get('/begin','Desplegador\DespliegueController@configuration');
Route::get('/resume/{language}/{id}','Desplegador\DespliegueController@resume');
Route::get('/detail/{id}','Desplegador\DespliegueController@detail');
Route::post('/deploy','Desplegador\DespliegueController@deploy');
Route::post('/email','Desplegador\DespliegueController@email');
Route::post('/emailFinish','Desplegador\DespliegueController@emailFinish');
Route::get('/message/{id}','Desplegador\DespliegueController@message');
Route::get('/jenkins','Desplegador\DespliegueController@jenkins');
Route::get('/','Desplegador\DespliegueController@index');
