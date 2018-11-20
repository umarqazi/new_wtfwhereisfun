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
    Route::get('login', 'MainController@index')->name('login');
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

    Route::get('organizer/{slug}', 'OrganizerController@organizerProfile');

    Route::resource('blogs', 'BlogController');

    Route::post('checkout', 'PaymentController@checkout');
    Route::post('validate-checkout', 'PaymentController@validateCheckout');
    Route::post('checkout/proceed', 'PaymentController@completeCheckout');
    Route::post('checkout/notify', 'PaymentController@notifyCheckout');
    Route::get('checkout/success', 'PaymentController@successCheckout');
    Route::get('checkout/cancel', 'PaymentController@cancelCheckout');
    Route::post('checkout/stripe', 'PaymentController@stripeCheckout');

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

        Route::get('my-tickets',  'EventTicketController@myTickets');

        Route::group(['middleware' => ['role:vendor']], function () {
            Route::get('dashboard',  'UsersController@vendorDashboard');

            Route::resource('events', 'EventController');
            Route::get('my-events', 'EventController@getMyEvents');

            Route::post('get-event-sub-topics', 'EventController@getTopicSubTopics');

            Route::get('events/{id}/dashboard', 'EventController@dashboard');
            Route::prefix('events')->group(function () {

                Route::post('go-live', 'EventController@eventGoLive');

                Route::post('update-details', 'EventController@detailsUpdate');
                Route::post('update-topics', 'EventController@topicsUpdate');

                Route::post('maps-search', 'EventController@searchLocation');
                Route::post('add-new-location-row', 'EventController@addNewLocationRow');
                Route::post('update-time-location', 'EventController@timeLocationUpdate');

                Route::post('update-ticket', 'EventController@ticketUpdate');
                Route::post('add-new-ticket', 'EventController@addNewTicket');
                Route::post('delete-ticket', 'EventController@ticketDelete');

                Route::post('add-new-ticket-pass', 'EventController@addNewTicketPass');
                Route::post('update-pass', 'EventController@ticketPassUpdate');
                Route::post('delete-pass', 'EventController@ticketPassDelete');

                Route::post('update-layout', 'EventController@eventLayoutUpdate');
                Route::post('add-new-image', 'EventController@addNewImage');
                Route::post('upload-image', 'EventController@uploadEventImage');
                Route::post('remove-image', 'EventController@removeEventImage');

                Route::post('make-hot-deal', 'EventController@makeHotDeal');
                Route::post('remove-deal', 'EventController@removeHotDeal');


            });

            /*Organzier Routes*/
            Route::resource('organizers', 'OrganizerController');
            Route::post('organizers/update-profile', 'OrganizerController@profileUpdate');
            Route::post('organizers/update-social-links', 'OrganizerController@socialLinksUpdate');
            Route::post('organizers/update-profile-colors', 'OrganizerController@profileColorsUpdate');
            Route::post('organizers/upload-image', 'OrganizerController@uploadImage');
            Route::post('organizers/remove-image', 'OrganizerController@removeImage');

        });
    });

    Route::prefix('events')->group(function () {
        Route::get('hot-deals', 'EventController@getHotDealEvents');
        Route::get('all', 'EventController@getAllLiveEvents');
        Route::get('{id}', 'EventController@show')->name('showById');
        Route::post('get-time-location', 'EventController@getTimeLocation');
    });

});

