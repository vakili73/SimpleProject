<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {
    // Define Home Page or Dashboard
    Route::get('/home/superadmin', 'HomeSuperAdminController@getIndex');

    // Route::get('/home/superuser','HomeSuperUserController@getIndex');
    // Route::post('/home/superuser', 'HomeSuperUserController@postIndex');
    // Route::post('/home/superuser/information', 'HomeSuperUserController@postInformation');
    // Route::post('/home/superuser/today', 'HomeSuperUserController@postToday');
    // Route::post('/home/superuser/geographic', 'HomeSuperUserController@postGeographic');

    // User Profile Edit
    Route::post('/profile', 'ProfileController@postIndex');

    // Define Menu Page Routine
    Route::get('/user', 'PageUserController@getIndex');
    Route::post('/user/create', 'PageUserController@postCreate');
    Route::post('/user/delete', 'PageUserController@postDelete');
    Route::post('/user/update', 'PageUserController@postUpdate');

    Route::get('/group', 'PageGroupController@getIndex');
    Route::post('/group/create', 'PageGroupController@postCreate');
    Route::post('/group/delete', 'PageGroupController@postDelete');
    Route::post('/group/update', 'PageGroupController@postUpdate');

    Route::get('/grtvss', 'PageGrtvssController@getIndex');
    Route::post('/grtvss/create', 'PageGrtvssController@postCreate');
    Route::post('/grtvss/delete', 'PageGrtvssController@postDelete');
    Route::post('/grtvss/update', 'PageGrtvssController@postUpdate');

    Route::get('/grvss', 'PageGrvssController@getIndex');
    Route::post('/grvss/create', 'PageGrvssController@postCreate');
    Route::post('/grvss/delete', 'PageGrvssController@postDelete');
    Route::post('/grvss/update', 'PageGrvssController@postUpdate');

    Route::get('/grvkl', 'PageGrvklController@getIndex');
    Route::post('/grvkl/create', 'PageGrvklController@postCreate');
    Route::post('/grvkl/delete', 'PageGrvklController@postDelete');
    Route::post('/grvkl/update', 'PageGrvklController@postUpdate');

    Route::get('/gsvbb', 'PageGsvbbController@getIndex');
    Route::post('/gsvbb/create', 'PageGsvbbController@postCreate');
    Route::post('/gsvbb/delete', 'PageGsvbbController@postDelete');
    Route::post('/gsvbb/update', 'PageGsvbbController@postUpdate');

    Route::get('/gsvp', 'PageGsvpController@getIndex');
    Route::post('/gsvp/create', 'PageGsvpController@postCreate');
    Route::post('/gsvp/delete', 'PageGsvpController@postDelete');
    Route::post('/gsvp/update', 'PageGsvpController@postUpdate');

    Route::get('/grtb', 'PageGrtbController@getIndex');
    Route::post('/grtb/create', 'PageGrtbController@postCreate');
    Route::post('/grtb/delete', 'PageGrtbController@postDelete');
    Route::post('/grtb/update', 'PageGrtbController@postUpdate');

    // Route::get('/company', 'PageCompanyController@getIndex');
    // Route::post('/company/create', 'PageCompanyController@postCreate');
    // Route::post('/company/delete', 'PageCompanyController@postDelete');
    // Route::post('/company/update', 'PageCompanyController@postUpdate');

    // Define Menu Report Routine
    // Route::get('/report/complete', 'ReportCompleteController@getIndex');
    // Route::post('/report/complete', 'ReportCompleteController@postIndex');

    // Route::get('/report/periodic', 'ReportPeriodicController@getIndex');
    // Route::post('/report/periodic', 'ReportPeriodicController@postIndex');

    // Route::get('/report/metallurgy', 'ReportMetallurgyController@getIndex');
    // Route::post('/report/metallurgy', 'ReportMetallurgyController@postIndex');

});