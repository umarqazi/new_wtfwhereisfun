<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(App\Testimonial::class, function (Faker $faker) {

    return [
        'name'                  => $faker->firstName(),
        'description'           => $faker->text($maxNbChars = 250),
        'image'                 => $faker->imageUrl(640, 480, 'business', true),
        'thumbnail'             => $faker->imageUrl(100, 100, 'business', true),
        'created_at'            => $faker->dateTimeBetween('-1 days', 'now', 'Asia/Karachi'),
        'updated_at'            => $faker->dateTimeBetween('-1 days', 'now', 'Asia/Karachi')
    ];

});


$factory->define(App\Blog::class, function (Faker $faker) {
    return [
        'title'                 => $faker->firstName(),
        'description'           => $faker->text($maxNbChars = 250),
        'image'                 => $faker->imageUrl(640, 480, 'business', true),
        'thumbnail'             => $faker->imageUrl(100, 100, 'business', true),
        'created_at'            => $faker->dateTimeBetween('-1 days', 'now', 'Asia/Karachi'),
        'updated_at'            => $faker->dateTimeBetween('-1 days', 'now', 'Asia/Karachi')
    ];

});

$factory->define(App\User::class, function (Faker $faker) {
    static $email;
    return [
        'first_name'            => $faker->firstName(),
        'last_name'             => $faker->lastName,
        'email'                 => $email ?: preg_replace('/@example\..*/', '@wtf.com', $faker->unique()->safeEmail),
        'password'              => $password = Hash::make('12345678'),
        'is_verified'           => 1,
        'created_at'            => $faker->dateTimeBetween('-1 days', 'now', 'Asia/Karachi'),
        'updated_at'            => $faker->dateTimeBetween('-1 days', 'now', 'Asia/Karachi')
    ];
});