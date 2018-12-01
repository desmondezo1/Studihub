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

Route::get('/', 'CourseContentController@displaycontent');

Route::get('/learn/{course_name}', 'CourseContentController@listTopics');

//Route::post('/topic', 'CourseContentController@getVideo');

Route::get('/learn/{topic_name}','LearnController@index');

Route::get('/learn/{course_name}/{topic_title}','CourseContentController@displayTopicsdetails');

Route::get('/about', 'AboutController@about');

Route::get('/pricing','PricingController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
