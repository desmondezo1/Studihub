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
    /*Site main pages routes below*/
    Route::get('/', '\Studihub\Http\Controllers\HomeController@index')->name('home');
    Route::get('/about', '\Studihub\Http\Controllers\HomeController@about')->name('about');
    Route::get('/contact', '\Studihub\Http\Controllers\HomeController@contact')->name('contact');
    Route::get('/privacy', '\Studihub\Http\Controllers\HomeController@privacy')->name('privacy');
    Route::get('/terms', '\Studihub\Http\Controllers\HomeController@terms')->name('terms');

    Route::get('/private-tutor', '\Studihub\Http\Controllers\HomeController@privateTutorRequest')->name('tutor.request');
    Route::get('/tutor-signup', '\Studihub\Http\Controllers\HomeController@privateTutorSignup')->name('tutor.signup');

    /*Access unrestricted contents below*/
    Route::get('/courses', '\Studihub\Http\Controllers\CourseController@index')->name('courses.index');
    Route::get('learn/{slug}','\Studihub\Http\Controllers\CourseController@show')->name('topics.index');
    Route::get('/courses/{slug}', '\Studihub\Http\Controllers\CourseController@show')->name('courses.show');
    Route::get('/topics', '\Studihub\Http\Controllers\TopicsController@index')->name('topics.index');
    Route::get('/pricing', '\Studihub\Http\Controllers\PricingController@index')->name('pricing.index');
});




/************************************** Back End Routes For Students***********************************/
Route::middleware(['throttle'])->group( function () {
    /*Routes for guest students i.e unauthenticated students*/
    Route::group(['middleware' => ['student-guest']], function () {
        Route::get('/auth/login','\Studihub\Http\Controllers\Auth\LoginController@showLoginForm')->name('getLogin');
        Route::post('/auth/login','\Studihub\Http\Controllers\Auth\LoginController@login')->name('login');
        Route::get('/auth/register','\Studihub\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('getRegister');
        Route::post('/auth/register', '\Studihub\Http\Controllers\Auth\RegisterController@register')->name('auth.register');
        Route::post('/auth/register/verify', '\Studihub\Http\Controllers\Auth\RegisterController@verifyEmail')->name('auth.verify');
        Route::get('/auth/password/forgot', '\Studihub\Http\Controllers\Auth\ForgotPasswordController@create')->name('forgot');
        Route::post('/auth/password/forgot', '\Studihub\Http\Controllers\Auth\ForgotPasswordController@store')->name('forgot');
        Route::get('/auth/password/reset/{token}',  '\Studihub\Http\Controllers\Auth\ResetPasswordController@create')->name('password.reset');
        Route::post('/auth/password/reset', '\Studihub\Http\Controllers\Auth\ResetPasswordController@store')->name('password.reset');
    });
    Route::get('/auth/logout', '\Studihub\Http\Controllers\Auth\LoginController@logout')->name('logout');
});

/*Routes for authenticated students i.e requires login before access*/
Route::group(['middleware' => ['middleware'=>'student-auth']], function () {
    Route::get('/student', '\Studihub\Http\Controllers\Student\StudentDashboardController@index')->name('student.index');

    Route::get('/topics/{slug}', '\Studihub\Http\Controllers\TopicsController@show')->name('topics.show')->middleware('enrolled');
    Route::post('/pay', '\Studihub\Http\Controllers\Student\StudentPaymentController@initialize')->name('pay');
    Route::post('/rave/callback', '\Studihub\Http\Controllers\Student\StudentPaymentController@callback')->name('callback');
});
/************************************** End Routes For Students***********************************/

/************************************** Back End Routes For Tutors***********************************/

Route::middleware(['throttle'])->group( function () {
    /*Routes for tutors guest routes i.e not yet authenticated*/
    Route::group(['middleware' => ['tutor-guest']], function () {
        Route::get('/tutor/login','\Studihub\Http\Controllers\Tutor\Auth\LoginController@showLoginForm')->name('tutor.getLogin');
        Route::post('/tutor/login','\Studihub\Http\Controllers\Tutor\Auth\LoginController@login')->name('tutor.login');
        Route::get('/tutor/register','\Studihub\Http\Controllers\Tutor\Auth\RegisterController@showRegistrationForm')->name('tutor.getRegister');
        Route::post('/tutor/register', '\Studihub\Http\Controllers\Tutor\Auth\RegisterController@register')->name('tutor.auth.register');
        Route::get('/tutor/register/verify', '\Studihub\Http\Controllers\Tutor\Auth\VerificationController@shouldVerify')->name('verification.notice');
        Route::post('/tutor/register/resend', '\Studihub\Http\Controllers\Tutor\Auth\VerificationController@resend')->name('verification.resend');
        Route::get('/tutor/register/resend', '\Studihub\Http\Controllers\Tutor\Auth\VerificationController@getResend')->name('verification.getResend');
        Route::post('/tutor/register/verify/{code}', '\Studihub\Http\Controllers\Tutor\Auth\VerificationController@verifyEmail')->name('tutor.verify');
        Route::get('/tutor/password/forgot', '\Studihub\Http\Controllers\Tutor\Auth\ForgotPasswordController@create')->name('tutor.forgot');
        Route::post('/tutor/password/forgot', '\Studihub\Http\Controllers\Tutor\Auth\ForgotPasswordController@store')->name('tutor.forgot');
        Route::get('/tutor/password/reset/{token}',  '\Studihub\Http\Controllers\Tutor\Auth\ResetPasswordController@create')->name('tutor.password.reset');
        Route::post('/tutor/password/reset', '\Studihub\Http\Controllers\Tutor\Auth\ResetPasswordController@store')->name('tutor.password.reset');
    });
    Route::get('/tutor/logout', '\Studihub\Http\Controllers\Tutor\Auth\LoginController@logout')->name('tutor.logout');
});

  /*Routes for tutors only*/
Route::group(['middleware'=>['tutor-auth','verified-tutor']], function () {
    Route::get('/tutor', '\Studihub\Http\Controllers\Tutor\TutorDashboardController@index')->name('tutor.index');

});
/************************************** End Routes For Tutors***********************************/



/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['throttle'])->group( function () {
    /*Routes for tutors guest routes i.e not yet authenticated*/
    Route::group(['middleware' => ['throttle']], function () {
        Route::get('/admin/login','\Studihub\Http\Controllers\Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    });

    Route::group(['middleware' => ['throttle']], function () {
        Route::post('/admin/login','\Studihub\Http\Controllers\Admin\Auth\LoginController@login')->name('admin.login');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', '\Studihub\Http\Controllers\Admin\AdminDashboardController@index')->name('admin.index');
});