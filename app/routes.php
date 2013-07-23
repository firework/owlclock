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

Route::resource('projects.tasks', 'TaskController', ['except' => ['destroy']]);
Route::get('projects/{projects}/tasks/{tasks}/delete', ['as' => 'projects.tasks.delete', 'uses' => 'TaskController@delete']);



Route::resource('projects.tasks.comments', 'CommentsController', ['except' => ['destroy', 'index', 'show']]);
Route::get('projects/{projects}/tasks/{tasks}/comments/{comment}/delete', ['as' => 'projects.tasks.comments.delete', 'uses' => 'CommentController@delete']);
Route::get('comments/delete/{id}', ['as' => 'comments.delete', 'uses' => 'CommentsController@delete']);


Route::resource('times', 'TimesController', ['except' => ['destroy', 'index', 'show']]);
Route::get('times/delete/{id}', ['as' => 'times.delete', 'uses' => 'TimesController@delete']);
