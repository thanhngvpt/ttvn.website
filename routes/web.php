<?php

\Route::group(['middleware' => ['web.values']], function () {
    // \Route::get('/', 'Web\IndexController@index');

    \Route::group(['middleware' => ['web.guest']], function () {
        \Route::get('/', 'Web\IndexController@index');
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

\Route::group(['middleware' => ['web.values']], function () {
    Route::get('new-by-category', 'Web\HomeController@getNewByCate');
    Route::get('get-news-via-category', 'Web\NewsController@getNewsViaCategory');
    Route::get('/', 'Web\HomeController@index');

    Route::get('lien-he', function () {
        return view('pages.web.contact');
    });

    Route::get('van-hoa-doanh-nghiep', 'Web\JobController@index');

    Route::get('gioi-thieu-tap-doan', 'Web\IntroduceCompanyController@index');
    Route::get('ban-lanh-dao', 'Web\IntroduceCompanyController@leader');
    Route::get('tin-tuc', 'Web\NewsController@all');

    Route::get('van-hoa-doanh-nghiep/tuyen-dung', 'Web\JobController@listJob');
    Route::get('van-hoa-doanh-nghiep/tuyen-dung/{slug}', 'Web\JobController@detail')->name('job.details');
    Route::post('post-cv', 'Web\JobController@postCV');

    // Route::get('job-detail', function () {
    //     return view('pages.web.job-detail');
    // });

    
    // Route::get('gioi-thieu-tap-doan/{type}', 'Web\IntroduceCompanyController@index');
    
    Route::get('get-project-via-field', 'Web\ScopeActiveController@getProjects');
    Route::get('/{slug}', 'Web\ScopeActiveController@index');
    Route::get('tin-tuc/{category}', 'Web\NewsController@index');
    Route::get('tin-tuc/{category}/{slug}', 'Web\NewsController@details');
    Route::post('post-contact', 'Web\ContactController@index')->name('post-contact');
});
