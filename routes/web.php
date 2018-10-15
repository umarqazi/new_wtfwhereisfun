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

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/admin', 'AdminController@login')->name('Admin Login');
//Route::post('/admin/authenticate', 'AdminController@authenticate')->name('Admin Authentication');
//Route::get('/admin/dashboard', 'AdminController@index')->name('Admin Dashboard');


//Route::get('profile',  'UsersController@profile')->name('profile');
//Route::get('edit-profile',  'UsersController@edit')->name('edit profile');
//Route::patch('update-profile', 'UsersController@update');
//->name('update profile');
Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'MainController@index');
    Route::get('about-us', 'MainController@aboutUs');
    Route::get('terms-conditions', 'MainController@termsCondition');
    Route::get('privacy-policy', 'MainController@privacyPolicy');
    Route::get('contact-us', 'MainController@contactUs');

    Route::post('do-login',  'MainController@authenticate');
    Route::get('logout',  'MainController@logout');
    Route::post('do-register', 'MainController@register');
    Route::get('user/verify/{token}', 'MainController@verifyUser');

    Route::get('forgot-password', 'MainController@forgetPassword');
    Route::post('do-forgot-password', 'MainController@doForgetPassword');
    Route::get('reset-password/{token}', 'MainController@resetPassword');
    Route::post('do-reset-password', 'MainController@doResetPassword');

    Route::resource('blogs', 'BlogController');

    Route::group(['middleware' => ['auth']], function () {
        /*User Routes*/
        Route::get('profile', 'UsersController@edit');
        Route::post('update-profile', 'UsersController@profileUpdate');
        Route::post('update-contact', 'UsersController@contactUpdate');
        Route::post('update-address', 'UsersController@addressUpdate');
        Route::post('update-email-preference', 'UsersController@emailPreferenceUpdate');
        Route::post('update-password', 'UsersController@passwordUpdate');
        Route::post('update-other-info', 'UsersController@otherInformationUpdate');
        Route::post('upload-image',  'UsersController@uploadImage');
        Route::delete('remove-image', 'UsersController@removeImage');

        Route::post('get-country-states', 'AddressController@getCountryStates');
        Route::post('get-state-cities', 'AddressController@getStateCities');

        Route::group(['middleware' => ['role:vendor','auth']], function () {
            Route::get('dashboard',  'UsersController@vendorDashboard');

            Route::resource('events', 'EventController');
            Route::post('go-live', 'EventController@eventGoLive');
            Route::get('my-events', 'EventController@getMyEvents');

            Route::post('get-event-sub-topics', 'EventController@getTopicSubTopics');
            Route::post('events/update-details', 'EventController@detailsUpdate');
            Route::post('events/update-topics', 'EventController@topicsUpdate');

            Route::post('events/maps-search', 'EventController@searchLocation');
            Route::post('events/add-new-location-row', 'EventController@addNewLocationRow');
            Route::post('events/update-time-location', 'EventController@timeLocationUpdate');

            Route::post('events/update-ticket', 'EventController@ticketUpdate');
            Route::post('events/add-new-ticket', 'EventController@addNewTicket');
            Route::post('events/delete-ticket', 'EventController@ticketDelete');

            Route::post('events/add-new-ticket-pass', 'EventController@addNewTicketPass');
            Route::post('events/update-pass', 'EventController@ticketPassUpdate');
            Route::post('events/delete-pass', 'EventController@ticketPassDelete');


            Route::post('events/update-layout', 'EventController@eventLayoutUpdate');
            Route::get('event/layout', 'EventController@layout');
            Route::post('events/add-new-image', 'EventController@addNewImage');
            Route::post('events/upload-image', 'EventController@uploadEventImage');
            Route::post('events/remove-image', 'EventController@removeEventImage');

            /*Organzier Routes*/
            Route::resource('organizers', 'OrganizerController');
            Route::post('organizers/update-profile', 'OrganizerController@profileUpdate');
            Route::post('organizers/update-social-links', 'OrganizerController@socialLinksUpdate');
            Route::post('organizers/update-profile-colors', 'OrganizerController@profileColorsUpdate');
            Route::post('organizers/upload-image', 'OrganizerController@uploadImage');
            Route::post('organizers/remove-image', 'OrganizerController@removeImage');




        });
    });




});

