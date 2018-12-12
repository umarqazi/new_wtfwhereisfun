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

Route::get('/home', 'HomeController@index')->name('home');

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

    // OAuth Routes
    Route::get('auth/{provider}', 'MainController@redirectToProvider');
    Route::get('auth/{provider}/callback', 'MainController@handleProviderCallback');

    Route::get('forgot-password', 'MainController@forgetPassword');
    Route::post('do-forgot-password', 'MainController@doForgetPassword');
    Route::get('reset-password/{token}', 'MainController@resetPassword');
    Route::post('do-reset-password', 'MainController@doResetPassword');

    Route::get('organizer/{slug}', 'OrganizerController@organizerProfile');

    Route::resource('blogs', 'BlogController');

    Route::get('email', 'PaymentController@email');

    Route::post('checkout', 'PaymentController@checkout');
    Route::post('validate-checkout', 'PaymentController@validateCheckout');
    Route::post('checkout/proceed', 'PaymentController@stripeCheckout');
    Route::post('checkout/notify', 'PaymentController@notifyCheckout');
    Route::get('checkout/success', 'PaymentController@successCheckout');
    Route::get('checkout/cancel', 'PaymentController@cancelCheckout');
    Route::post('checkout/stripe', 'PaymentController@stripeCheckout');

    Route::get('event/hot-deals', 'EventController@getHotDealEvents');

    Route::group(['middleware' => ['auth']], function () {

        Route::get('select/role', 'UserController@selectRole');
        Route::post('update/role', 'UserController@updateUserRole');

        Route::group(['middleware' => ['emptyRole']], function () {
            /*User Routes*/

            Route::get('profile', 'UserController@edit');
            Route::post('update-profile', 'UserController@profileUpdate');
            Route::post('update-contact', 'UserController@contactUpdate');
            Route::post('update-address', 'UserController@addressUpdate');
            Route::post('update-email-preference', 'UserController@emailPreferenceUpdate');
            Route::post('update-password', 'UserController@passwordUpdate');
            Route::post('update-other-info', 'UserController@otherInformationUpdate');
            Route::post('upload-image',  'UserController@uploadImage');
            Route::delete('remove-image', 'UserController@removeImage');

            Route::post('get-country-states', 'AddressController@getCountryStates');
            Route::post('get-state-cities', 'AddressController@getStateCities');

            Route::get('my-tickets',  'EventTicketController@myTickets');
            Route::get('disputes', 'DisputeController@index');
            Route::get('disputes/{id}', 'DisputeController@show');
            Route::get('/ticket-dispute/{id}', 'DisputeController@create');
            Route::post('/submit-dispute', 'DisputeController@store');
            Route::post('/dispute-reply', 'DisputeController@reply');

            Route::group(['middleware' => ['role:vendor']], function () {
                Route::get('dashboard',  'UserController@vendorDashboard');

                Route::post('update-payment-info', 'UserController@paymentInfoUpdate');

                Route::get('my-events', 'EventController@getMyEvents');

                Route::post('get-event-sub-topics', 'EventController@getTopicSubTopics');

                Route::get('events/{locationId}/dashboard', 'EventController@dashboard');
                Route::get('events/{locationId}/dashboard/orders', 'EventController@dashboardOrders');

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

                    Route::get('calendar', 'EventController@calendar')->name('calendar');

                });

                Route::resource('events', 'EventController');

                /*Complaint Routes */
                Route::get('complaints', 'DisputeController@showComplaints');
                Route::post('/close-dispute', 'DisputeController@closeComplaints');

                /*Organzier Routes*/
                Route::post('change-orgranizer-url', 'OrganizerController@changeOrganizerUrl');
                Route::resource('organizers', 'OrganizerController');
                Route::post('organizers/update-profile', 'OrganizerController@profileUpdate');
                Route::post('organizers/update-social-links', 'OrganizerController@socialLinksUpdate');
                Route::post('organizers/update-profile-colors', 'OrganizerController@profileColorsUpdate');
                Route::post('organizers/upload-image', 'OrganizerController@uploadImage');
                Route::post('organizers/remove-image', 'OrganizerController@removeImage');

            });
        });

        Route::post('search-events', 'MainController@searchEvents');

        Route::get('pdf', 'EventController@pdf');
        Route::get('fb-callback', 'EventController@callback');
    });

    Route::prefix('events')->group(function () {
        Route::get('today-events/all', 'EventController@getTodaysEvents')->name('today-events');
        Route::get('future-events/all', 'EventController@getFutureEvents')->name('future-events');
        Route::get('{id}/{locationId}', 'EventController@show')->name('showById');
        Route::post('get-time-location', 'EventController@getTimeLocation');
    });
});

