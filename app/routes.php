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
	$pic = ((rand()&1)%2 == 1) ? true : false; //bobeira
	return View::make('index')->with('pic', $pic);
});
Route::resource('projects', 'ProjectController', ['except' => ['destroy']]);
Route::get('projects/delete/{id}', ['as' => 'projects.delete', 'uses' => 'ProjectController@delete']);

Route::resource('tasks', 'TaskController', ['except' => ['destroy', 'create']]);
Route::get('tasks/delete/{id}', ['as' => 'tasks.delete', 'uses' => 'TaskController@delete']);
Route::get('tasks/create/{id}', ['as' => 'tasks.create', 'uses' => 'TaskController@create']);


Route::get('test', function()
{
	return View::make('index');
});