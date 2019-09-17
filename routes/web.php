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

Route::get('/search','\Studihub\Http\Controllers\TopicsController@search')->name('topics.search');

Route::get('/getTopicsFromSearch','\Studihub\Http\Controllers\AjaxController@AjaxTopicSearch')->name('Ajax.topic.search');

Route::middleware(['throttle'])->group( function () {
    /*Site main pages routes below*/
    Route::get('/', '\Studihub\Http\Controllers\HomeController@index')->name('home');
    Route::get('/about', '\Studihub\Http\Controllers\HomeController@about')->name('about');
    Route::get('/contact', '\Studihub\Http\Controllers\HomeController@contact')->name('contact');
    Route::get('/privacy', '\Studihub\Http\Controllers\HomeController@privacy')->name('privacy');
    Route::get('/terms', '\Studihub\Http\Controllers\HomeController@terms')->name('terms');

    Route::get('/private/tutor', '\Studihub\Http\Controllers\RequestPrivateTutorController@create')->name('tutor.request');
    Route::post('/private/tutor', '\Studihub\Http\Controllers\RequestPrivateTutorController@store')->name('tutor.request.store');

    /*Access unrestricted contents below*/
    Route::get('/courses', '\Studihub\Http\Controllers\CourseController@index')->name('courses.index');
    Route::get('/learn', '\Studihub\Http\Controllers\CourseController@index')->name('learn.index');
    Route::get('learn/{slug}','\Studihub\Http\Controllers\TopicsController@show')->name('topics.display');
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
Route::group(['middleware'=>['student-auth','forbid-banned-user']], function () {
    Route::get('/student', '\Studihub\Http\Controllers\Student\StudentDashboardController@index')->name('students.index');

    Route::get('/topics/{slug}', '\Studihub\Http\Controllers\TopicsController@show')->name('topics.show')->middleware('enrolled');
    Route::post('/pay', '\Studihub\Http\Controllers\Student\StudentPaymentController@initialize')->name('pay');
    Route::post('/rave/callback', '\Studihub\Http\Controllers\Student\StudentPaymentController@callback')->name('callback');

    Route::get('/student/profile/{user_name}', '\Studihub\Http\Controllers\Student\StudentProfileController@show')->name('students.profile');
    Route::get('/student/questions', '\Studihub\Http\Controllers\Student\StudentQuestionsController@index')->name('students.questions.index');
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

    Route::post('/tutor/register/upload', '\Studihub\Http\Controllers\Tutor\Auth\RegisterController@uploadPhoto')->name('tutor.photo.upload');
});

  /*Routes for tutors only*/
Route::group(['middleware'=>['tutor-auth','verified-tutor']], function () {
    Route::get('/tutor', '\Studihub\Http\Controllers\Tutor\TutorDashboardController@index')->name('tutor.index');

});
/************************************** End Routes For Tutors***********************************/



Route::middleware(['throttle'])->group( function () {
  /*  //Route::get('/', '\Studihub\Http\Controllers\CourseController@index')->name('courses.index');

    Route::get('/', '\Studihub\Http\Controllers\HomeController@index')->name('home');
    Route::get('/about', '\Studihub\Http\Controllers\HomeController@about')->name('about');

    //Route::get('/courses', '\Studihub\Http\Controllers\CourseController@index')->name('courses.index');
    //Route::get('learn/{slug}','\Studihub\Http\Controllers\CourseController@show')->name('topics.index');

    //Route::get('/courses', '\Studihub\Http\Controllers\CourseController@index')->name('courses.index');
    Route::get('/courses/{slug}', '\Studihub\Http\Controllers\CourseController@show')->name('courses.show');

    Route::get('/topics', '\Studihub\Http\Controllers\TopicsController@index')->name('topics.index');
    Route::middleware(['student-auth'])->group(function (){
        Route::get('/topics/{slug}', '\Studihub\Http\Controllers\TopicsController@show')->name('topics.show');
        Route::post('/pay', '\Studihub\Http\Controllers\Student\StudentPaymentController@initialize')->name('pay');
        Route::post('/rave/callback', '\Studihub\Http\Controllers\Student\StudentPaymentController@callback')->name('callback');
    });*/

    //temporary routes for UI design front end
/*    Route::get('/admin', function () {
        return view('admin.pages.index', ['name' => 'James']);
    });
    Route::get('/admin/messages', function () {
        return view('admin.pages.messages', ['name' => 'James']);
    });
    Route::get('/admin/createlesson', function () {
        return view('admin.pages.createlesson', ['name' => 'James']);
    });
    Route::get('/admin/lessons', function () {
        return view('admin.pages.lessons', ['name' => 'James']);
    });
    Route::get('/admin/addlesson', function () {
        return view('admin.pages.addlesson', ['name' => 'James']);
    });
    Route::get('/admin/addquestion', function () {
        return view('admin.pages.addquestion', ['name' => 'James']);
    });
    Route::get('/admin/questions', function () {
        return view('admin.pages.questions', ['name' => 'James']);
    });
    Route::get('/admin/tutoraccounts', function () {
        return view('admin.pages.tutoraccounts', ['name' => 'James']);
    });
    Route::get('/privatetutor', function () {
        return view('privatetutor.index', ['name' => 'James']);
    });
    Route::get('/becomeatutor', function () {
        return view('becomeatutor.index', ['name' => 'James']);
    });*/
    /*Route::get('/pricing', '\Studihub\Http\Controllers\PricingController@index')->name('pricing.index');*/

/*    Route::get('/privatetutor', function () {
        return view('privatetutor.index', ['name' => 'James']);
    });
    Route::get('/becomeatutor', function () {
        return view('becomeatutor.index', ['name' => 'James']);
    });*/
});



/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['throttle'])->group( function () {
    /*Routes for tutors guest routes i.e not yet authenticated*/
    Route::get('/admin/login','\Studihub\Http\Controllers\Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/admin/login','\Studihub\Http\Controllers\Admin\Auth\LoginController@login')->name('admin.login');

    Route::get('/admin/register','\Studihub\Http\Controllers\Admin\Auth\RegisterController@register')->name('admin.register.create');
    Route::post('/admin/register','\Studihub\Http\Controllers\Admin\Auth\RegisterController@store')->name('admin.register.store');

    Route::get('/admin/password/reset/{token}',  '\Studihub\Http\Controllers\Admin\Auth\ResetPasswordController@create')->name('admin.password.reset');
    Route::post('/admin/password/reset', '\Studihub\Http\Controllers\Admin\Auth\ResetPasswordController@store')->name('admin.password.reset');

    Route::get('/admin/logout','\Studihub\Http\Controllers\Admin\Auth\LoginController@logout')->name('admin.logout');
});

Route::middleware(['auth','logs-out-banned-user'])->group(function () {
    Route::name('admin.')->group(function (){
        Route::get('/admin', '\Studihub\Http\Controllers\Admin\AdminDashboardController@index')->name('index');

        Route::resource('/admin/courses', '\Studihub\Http\Controllers\Admin\AdminCourseController');

        Route::any('/admin/embed/check-embed', '\Studihub\Http\Controllers\Admin\AdminTopicController@checkEmbedUrl');
        Route::resource('/admin/topics', '\Studihub\Http\Controllers\Admin\AdminTopicController');

        Route::resource('/admin/questions', '\Studihub\Http\Controllers\Admin\AdminQuestionController');
        Route::post('/admin/choices/check', '\Studihub\Http\Controllers\Admin\AdminChoiceController@checkChoice');
        Route::resource('/admin/choices', '\Studihub\Http\Controllers\Admin\AdminChoiceController');

        Route::get('/admin/students/{id}/courses/chart', '\Studihub\Http\Controllers\Admin\AdminStudentController@enrolledChart')->name('student.enrolled.chart');
        Route::get('/admin/students/{id}/courses', '\Studihub\Http\Controllers\Admin\AdminStudentController@enrolledCourses')->name('students.courses');
        Route::put('/admin/students/{id}/ban', '\Studihub\Http\Controllers\Admin\AdminStudentController@banstudent')->name('students.ban');
        Route::put('/admin/students/{id}/unban', '\Studihub\Http\Controllers\Admin\AdminStudentController@unbanstudent')->name('students.unban');
        Route::resource('/admin/students', '\Studihub\Http\Controllers\Admin\AdminStudentController');

        Route::put('/admin/admins/{id}/ban', '\Studihub\Http\Controllers\Admin\AdminUserController@banadmin')->name('admins.ban');
        Route::put('/admin/admins/{id}/unban', '\Studihub\Http\Controllers\Admin\AdminUserController@unbanadmin')->name('admins.unban');

        Route::post('/admin/admins/upload', '\Studihub\Http\Controllers\Admin\AdminUserController@upload')->name('admins.upload');
        Route::resource('/admin/admins', '\Studihub\Http\Controllers\Admin\AdminUserController');

        Route::resource('/admin/roles', '\Studihub\Http\Controllers\Admin\AdminRoleController');

        Route::get('/admin/enrolled/chart', '\Studihub\Http\Controllers\Admin\AdminEnrolledCourseController@chart')->name('enrolled.chart');
        Route::resource('/admin/enrolled', '\Studihub\Http\Controllers\Admin\AdminEnrolledCourseController');

        Route::get('/admin/answers/chart', '\Studihub\Http\Controllers\Admin\AdminStudentAnswerController@chart')->name('answers.chart');
        Route::resource('/admin/answers', '\Studihub\Http\Controllers\Admin\AdminStudentAnswerController');
    });
});