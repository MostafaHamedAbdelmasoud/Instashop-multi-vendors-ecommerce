<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Modules\Accounts\Entities\Supervisor;

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

$factory->define(\Modules\Countries\Entities\Country::class, function (Faker $faker) {
    return [
        'name' => $faker->country,
        'code' => $faker->countryCode,
        'key' => $faker->randomDigit,
        'currency' => $faker->word,
    ];
});
