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
Route::group(['middleware' => 'guest'], function() {
    Route::get('/top', 'TopController@index')->name('top');;
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/tasks', 'TaskController@index')->name('tasks.index');

    Route::get('/tasks/add', 'TaskController@showAddForm')->name('tasks.add');

    Route::post('/tasks/add', 'TaskController@add');
    
    Route::get('/tasks/{task_id}/edit', 'TaskController@showEditForm')->name('tasks.edit');
    
    Route::post('/tasks/{task_id}/edit', 'TaskController@edit');
    
    Route::post('/tasks/delete/{task_id}', 'TaskController@destroyTask')->name('tasks.delete');
});
Auth::routes();