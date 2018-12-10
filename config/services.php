<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => env('FACEBOOK_APP_ID'),         // Your Facebook Client ID
        'client_secret' => env('FACEBOOK_APP_SECRET'), // Your Facebook Client Secret
        'redirect' => env('APP_URL').env('FACEBOOK_REDIRECT_URL'),
    ],


    'google' => [
        'client_id' => env('GOOGLE_APP_ID'),         // Your Google Client ID
        'client_secret' => env('GOOGLE_APP_SECRET'), // Your Google Client Secret
        'redirect' => env('APP_URL').env('GOOGLE_REDIRECT_URL'),
    ],


    'linkedin' => [
        'client_id' => env('LINKEDIN_APP_ID'),      // Your Linkedin Client ID
        'client_secret' => env('LINKEDIN_APP_SECRET'),  // Your Linkedin Client Secret
        'redirect' => env('APP_URL').env('LINKEDIN_REDIRECT_URL'),
    ],

];
