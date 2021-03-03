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

    Route::get('/tasks/all', 'TaskController@all')->name('tasks.all');

    Route::get('/tasks/done', 'TaskController@done')->name('tasks.done');

    Route::get('/tasks/duedate', 'TaskController@sortByDuedate')->name('tasks.duedate');

    Route::get('/task/{task_id}/detail', 'TaskController@detail')->name('tasks.detail');


    Route::get('/tasks/add', 'TaskController@showAddForm')->name('tasks.add');

    Route::post('/tasks/add', 'TaskController@add');
    
    Route::get('/tasks/{task_id}/edit', 'TaskController@showEditForm')->name('tasks.edit');
    
    Route::post('/tasks/{task_id}/edit', 'TaskController@edit');

    Route::get('/tasks/{task_id}/delete', 'TaskController@showDeleteForm')->name('tasks.delete');
    
    Route::post('/tasks/{task_id}/delete', 'TaskController@destroyTask');
});
Auth::routes();