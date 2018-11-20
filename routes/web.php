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

Route::get('/', function () {
    return view('course-content.course-content');
});

Route::get('/courses', function () {
    return view('course-content.course-content');
});

Route::get('/about', 'AboutController@about');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
