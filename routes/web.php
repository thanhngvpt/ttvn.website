<?php

\Route::group(['middleware' => ['web.values']], function () {
    \Route::get('/', 'Web\IndexController@index');

    \Route::group(['middleware' => ['web.guest']], function () {
        \Route::get('signin', 'Web\AuthController@getSignIn');
        \Route::post('signin', 'Web\AuthController@postSignIn');

        \Route::get('signin/facebook', 'Web\FacebookServiceAuthController@redirect');
        \Route::get('signin/facebook/callback', 'Web\FacebookServiceAuthController@callback');

        \Route::get('forgot-password', 'Web\PasswordController@getForgotPassword');
        \Route::post('forgot-password', 'Web\PasswordController@postForgotPassword');

        \Route::get('reset-password/{token}', 'Web\PasswordController@getResetPassword');
        \Route::post('reset-password', 'Web\PasswordController@postResetPassword');

        \Route::get('signup', 'Web\AuthController@getSignUp');
        \Route::post('signup', 'Web\AuthController@postSignUp');

    });

    \Route::group(['middleware' => ['web.auth']], function () {

    });
});

Route::get('/', 'Web\HomeController@index');
Route::get('new-by-category', 'Web\HomeController@getNewByCate');

Route::get('contact', function () {
    return view('pages.web.contact');
});

// Route::get('job', 'Web\JobController@index');

Route::get('job', 'Web\JobController@listJob');
Route::get('job/{slug}', 'Web\JobController@detail')->name('job.details');
Route::post('post-cv', 'Web\JobController@postCV');

// Route::get('job-detail', function () {
//     return view('pages.web.job-detail');
// });

Route::get('news/{slug}', 'Web\NewsController@details');

Route::get('introduce-company', 'Web\IntroduceCompanyController@index');

Route::get('scope-active', 'Web\ScopeActiveController@index');
Route::get('news', 'Web\NewsController@index');
Route::get('get-news-via-category', 'Web\NewsController@getNewsViaCategory');
Route::get('get-project-via-field', 'Web\ScopeActiveController@getProjects');
Route::post('post-contact', 'Web\ContactController@index')->name('post-contact');
