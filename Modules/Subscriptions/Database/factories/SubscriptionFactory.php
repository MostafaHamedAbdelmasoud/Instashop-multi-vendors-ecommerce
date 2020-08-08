<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Modules\Stores\Entities\Store;
use Modules\Accounts\Entities\Helpers\helpers;
use Modules\Subscriptions\Entities\Subscription;

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

$factory->define(Subscription::class, function (Faker $faker) {
    $h = new helpers();

    return [
        'model_type' => 'store',
        'model_id' => $h->random_or_create(Store::class)->id,
        'start_at' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),
        'end_at' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+1 year', $timezone = null),
        'paid_amount' => $faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = 1000.00),
    ];
});
