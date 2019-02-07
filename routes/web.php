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

Route::get('/', 'McqController@index')->name('index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/exam/make/{grade}/{subject}/{topic}', 'McqExamController@make')->name('exam.make');
Route::get('/exam/bench/{grade}/{subject}/{topic}', 'McqExamController@bench')->name('exam.bench');
