<?php

use App\Models\Url;
use App\Models\User;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
 */

$factory->define(Url::class, function (Faker $faker) {

    $url    = new Url();
    $events = $faker->dateTimeBetween('-30 days', '+30 days');

    return [
        'user_id'    => 1,
        'long_url'   => 'https://github.com/rizkhal',
        'meta_title' => 'No Title',
        'keyword'    => $url->randomKey(),
        'is_custom'  => 0,
        'clicks'     => mt_rand(10000, 999999999),
        'ip'         => $faker->ipv4,
        'created_at' => $events,
    ];
});
