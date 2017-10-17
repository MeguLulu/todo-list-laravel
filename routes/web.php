<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::resource('/', 'eventController');

// Route::get('/', function () {
//     return view('index');
// });

/*
|--------------------------------------------------------------------------
| Route général du site
|--------------------------------------------------------------------------
*/
Route::get('/', [
    'uses' => 'eventController@index',
    'as' => 'index'
]);

/*
|--------------------------------------------------------------------------
| Route des Tâches
|--------------------------------------------------------------------------
*/

Route::post('/task/create', [
    'uses' => 'eventController@createTask',
    'as' => 'task.create'
]);

Route::post('/task', [
    'uses' => 'eventController@storeTask',
    'as' => 'task.store'
]);
Route::post('/task/edit', [
    'uses' => 'eventController@editTask',
    'as' => 'task.edit'
]);
Route::any('/task/{id}/update', [
    'uses' => 'eventController@updateTask',
    'as' => 'task.update'
]);
Route::get('/task/{id}/delete', [
    'uses' => 'eventController@destroyTask',
    'as' => 'task.delete'
]);

/*
|--------------------------------------------------------------------------
| Route des Rappels
|--------------------------------------------------------------------------
*/

Route::post('/remind/create', [
    'uses' => 'eventController@createRemind',
    'as' => 'remind.create'
]);

Route::post('/remind', [
    'uses' => 'eventController@storeRemind',
    'as' => 'remind.store'
]);
Route::post('/remind/edit', [
    'uses' => 'eventController@editRemind',
    'as' => 'remind.edit'
]);
Route::any('/remind/{id}/update', [
    'uses' => 'eventController@updateRemind',
    'as' => 'remind.update'
]);
Route::get('/remind/{id}/delete', [
    'uses' => 'eventController@destroyRemind',
    'as' => 'remind.delete'
]);
