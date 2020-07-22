<?php

use App\Models\Url;
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

$factory->define(App\Models\Visit::class, function (Faker $faker) {

    $events = $faker->dateTimeBetween('-30 days', '+30 days');

    return [
        'url_id'           => function () {
            return factory(Url::class)->create()->id;
        },
        'referer'          => 'https://github.com/rizkhal',
        'ip'               => $faker->ipv4,
        'device'           => 'WebKit',
        'platform'         => 'Windows',
        'platform_version' => '10',
        'browser'          => 'Chrome',
        'browser_version'  => '75.0.3770.100',
        'created_at'       => $events,
    ];
});
