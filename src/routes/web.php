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

// 一覧画面のルート定義
Route::get('/todo', 'TodoController@index')->name('todo.index');

// 新規作成画面のルート定義
Route::get('/todo/create', 'TodoController@create')->name('todo.create');
Route::post('/todo', 'TodoController@store')->name('todo.store');

// 詳細画面のルート定義
Route::get('/todo/{id}', 'TodoController@show')->name('todo.show');

// 編集画面のルート定義
Route::get('/todo/{id}/edit', 'TodoController@edit')->name('todo.edit');
Route::put('/todo/{id}', 'TodoController@update')->name('todo.update');

// 削除画面のルート定義
Route::delete('/todo/{id}', 'TodoController@delete')->name('todo.delete');