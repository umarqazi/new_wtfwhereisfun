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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/admin', 'AdminController@login')->name('Admin Login');
//Route::post('/admin/authenticate', 'AdminController@authenticate')->name('Admin Authentication');
//Route::get('/admin/dashboard', 'AdminController@index')->name('Admin Dashboard');


Route::get('profile',  'UsersController@profile')->name('profile');
Route::get('edit-profile',  'UsersController@edit')->name('edit profile');
//Route::patch('update-profile', 'UsersController@update');
//->name('update profile');
Route::group(['middleware' => ['web']], function () {

    Route::get('/', 'MainController@index');
    Route::get('about-us', 'MainController@aboutUs');
    Route::get('terms-conditions', 'MainController@termsCondition');
    Route::get('privacy-policy', 'MainController@privacyPolicy');
    Route::get('contact-us', 'MainController@contactUs');

    Route::post('do-login',  'MainController@authenticate');
    Route::post('do-register', 'MainController@register');
    Route::get('user/verify/{token}', 'MainController@verifyUser');

    Route::get('forgot-password', 'MainController@forgetPassword');
    Route::post('do-forgot-password', 'MainController@doForgetPassword');
    Route::get('reset-password/{token}', 'MainController@resetPassword');
    Route::post('do-reset-password', 'MainController@doResetPassword');

    Route::resource('blogs', 'BlogController')->only('show');

    Route::group(['middleware' => ['auth']], function () {

        /*User Routes*/
        Route::get('account-settings', 'UsersController@accountSettings');
        Route::post('update-profile', 'UsersController@profileUpdate');
        Route::post('update-contact', 'UsersController@contactUpdate');
        Route::post('update-address', 'UsersController@addressUpdate');
        Route::post('update-email-preference', 'UsersController@emailPreferenceUpdate');
        Route::post('update-password', 'UsersController@passwordUpdate');
        Route::post('update-other-info', 'UsersController@otherInformationUpdate');

        Route::post('get-country-states', 'AddressController@getCountryStates');
        Route::post('get-state-cities', 'AddressController@getStateCities');

        /*Organzier Routes*/
        Route::resource('organizers', 'OrganizerController');
        Route::post('organizers/update-profile', 'OrganizerController@profileUpdate');
        Route::post('organizers/update-social-links', 'OrganizerController@socialLinksUpdate');
        Route::post('organizers/update-profile-colors', 'OrganizerController@profileColorsUpdate');

        Route::group(['middleware' => ['role:vendor','auth']], function () {
            Route::get('dashboard',  'UsersController@vendorDashboard');
            Route::resource('events', 'EventController');
            Route::post('get-event-sub-topics', 'EventController@getTopicSubTopics');
            Route::post('events/update-details', 'EventController@detailsUpdate');
            Route::post('events/update-topics', 'EventController@topicsUpdate');

        });
    });




});

