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


/*
|--------------------------------------------------------------------------
| FrontEnd Routes
|--------------------------------------------------------------------------
*/


Route::middleware(['throttle'])->group( function () {
    Route::group(['middleware' => ['student-guest','tutor-guest']], function () {
        Route::get('/auth/login','\Studihub\Http\Controllers\Auth\LoginController@showLoginForm')->name('getLogin');
        Route::post('/auth/login','\Studihub\Http\Controllers\Auth\LoginController@login')->name('login');
        Route::get('/auth/register','\Studihub\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('getRegister');
        Route::post('/auth/register', '\Studihub\Http\Controllers\Auth\RegisterController@register')->name('auth.register');
        Route::get('/auth/password/forgot', '\Studihub\Http\Controllers\Auth\ForgotPasswordController@create')->name('forgot');
        Route::post('/auth/password/forgot', '\Studihub\Http\Controllers\Auth\ForgotPasswordController@store')->name('forgot');
        Route::get('/auth/password/reset/{token}',  '\Studihub\Http\Controllers\Auth\ResetPasswordController@create')->name('password.reset');
        Route::post('/auth/password/reset', '\Studihub\Http\Controllers\Auth\ResetPasswordController@store')->name('password.reset');
    });
    Route::get('/auth/logout', '\Studihub\Http\Controllers\Auth\LoginController@logout')->name('logout');
});

/************************************** Back End Routes For Students***********************************/

Route::group(['middleware' => ['middleware'=>'student-auth']], function () {
    Route::get('/student', '\Studihub\Http\Controllers\Student\StudentDashboardController@index')->name('student.index');

});
/************************************** End Routes For Tutors***********************************/

/************************************** Back End Routes For Tutors***********************************/

Route::group(['middleware' => ['middleware'=>'tutor-auth']], function () {
    Route::get('/tutor', '\Studihub\Http\Controllers\Tutor\TutorDashboardController@index')->name('tutor.index');

});
/************************************** Front End Routes For Tutors***********************************/


Route::middleware(['throttle'])->group( function () {
    Route::get('/', '\Studihub\Http\Controllers\CourseController@index')->name('courses.index');
    
    // Route::get('/', '\Studihub\Http\Controllers\HomeController@index')->name('home');
    Route::get('/about', '\Studihub\Http\Controllers\HomeController@about')->name('about');
    //Route::get('/courses', '\Studihub\Http\Controllers\CourseController@index')->name('courses.index');
    Route::get('learn/{slug}','\Studihub\Http\Controllers\CourseController@show')->name('topics.index');
    Route::get('/pricing', '\Studihub\Http\Controllers\PricingController@index')->name('pricing.index');
});



/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
