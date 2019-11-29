<?php

\Route::group(['middleware' => ['admin.values']], function () {

    \Route::group(['middleware' => ['admin.guest']], function () {
        \Route::get('signin', 'Admin\AuthController@getSignIn');
        \Route::post('signin', 'Admin\AuthController@postSignIn');
        \Route::get('forgot-password', 'Admin\PasswordController@getForgotPassword');
        \Route::post('forgot-password', 'Admin\PasswordController@postForgotPassword');
        \Route::get('reset-password/{token}', 'Admin\PasswordController@getResetPassword');
        \Route::post('reset-password', 'Admin\PasswordController@postResetPassword');
    });

    \Route::group(['middleware' => ['admin.auth']], function () {

        \Route::group(['middleware' => ['admin.has_role.super_user']], function () {
            \Route::resource('users', 'Admin\UserController');
            \Route::resource('user-notifications', 'Admin\UserNotificationController');

            \Route::post('articles/preview', 'Admin\ArticleController@preview');
            \Route::get('articles/images', 'Admin\ArticleController@getImages');
            \Route::post('articles/images', 'Admin\ArticleController@postImage');
            \Route::delete('articles/images', 'Admin\ArticleController@deleteImage');
            \Route::resource('articles', 'Admin\ArticleController');

            \Route::delete('images/delete', 'Admin\ImageController@deleteByUrl');
            \Route::resource('images', 'Admin\ImageController');

            \Route::resource('oauth-clients', 'Admin\OauthClientController');
            \Route::resource('logs', 'Admin\LogController');

        });

        \Route::group(['middleware' => ['admin.has_role.admin']], function () {
            \Route::resource('admin-users', 'Admin\AdminUserController');
            \Route::resource('admin-user-notifications', 'Admin\AdminUserNotificationController');
            
            \Route::get('load-notification/{offset}', 'Admin\AdminUserNotificationController@loadNotification');
        });

        \Route::get('/', 'Admin\IndexController@index');

        \Route::get('/me', 'Admin\MeController@index');
        \Route::put('/me', 'Admin\MeController@update');
        \Route::get('/me/notifications', 'Admin\MeController@notifications');

        \Route::post('signout', 'Admin\AuthController@postSignOut');

        \Route::get('table-news/images', 'Admin\TableNewController@getImages');
        \Route::post('table-news/images', 'Admin\TableNewController@postImage');
        \Route::delete('table-news/images', 'Admin\TableNewController@deleteImage');
        \Route::resource('table-news', 'Admin\TableNewController');

        \Route::resource('banners', 'Admin\BannerController');
        \Route::resource('videos', 'Admin\VideoController');
        \Route::resource('headings', 'Admin\HeadingController');
        \Route::resource('infor-groups', 'Admin\InforGroupController');
        // \Route::resource('data-high-lights', 'Admin\DataHighLightController');
        \Route::resource('companies', 'Admin\CompanyController');
        \Route::resource('introduces', 'Admin\IntroduceController');
        \Route::resource('partners', 'Admin\PartnerController');
        \Route::resource('histories', 'Admin\HistoryController');
        \Route::resource('leader-ships', 'Admin\LeaderShipController');
        \Route::resource('fields', 'Admin\FieldController');
        \Route::resource('projects', 'Admin\ProjectController');
        \Route::resource('new-categories', 'Admin\NewCategoryController');
        \Route::resource('cultural-companies', 'Admin\CulturalCompanyController');
        \Route::resource('criteria-candidates', 'Admin\CriteriaCandidateController');
        \Route::resource('job-categories', 'Admin\JobCategoryController');
        \Route::resource('jobs', 'Admin\JobController');
        \Route::resource('meta', 'Admin\MetaController');
        \Route::resource('footers', 'Admin\FooterController');
        \Route::resource('contacts', 'Admin\ContactController');
        \Route::resource('cadidates', 'Admin\CadidateController');
        \Route::resource('save-values', 'Admin\SaveValueController');
        \Route::resource('data-highlights', 'Admin\DataHighlightController');
        /* NEW ADMIN RESOURCE ROUTE */

    });
});
