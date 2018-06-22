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

    // Route::get('/truck', 'PageTruckController@getIndex');
    // Route::post('/truck/create', 'PageTruckController@postCreate');
    // Route::post('/truck/delete', 'PageTruckController@postDelete');
    // Route::post('/truck/update', 'PageTruckController@postUpdate');

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