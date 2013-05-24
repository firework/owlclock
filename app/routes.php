<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('_base');
});
Route::resource('projects', 'ProjectController', ['except' => ['destroy']]);
Route::get('projects/delete/{id}', ['as' => 'projects.delete', 'uses' => 'ProjectController@delete']);
Route::get('projects/', 'ProjectController@makeIndex');
