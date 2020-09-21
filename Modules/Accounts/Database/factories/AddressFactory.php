<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Accounts\Entities\Address;
use Modules\Accounts\Entities\Helpers\helpers;

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
$factory->define(Address::class, function (Faker $faker) {
    $h = new helpers();

    return [
        'address' => $faker->address,
        'is_primary' => 1,
        'user_id' => $h->random_or_create(\Modules\Accounts\Entities\Customer::class)->id,
        'city_id' => $h->random_or_create(\Modules\Countries\Entities\City::class)->id,
    ];
});
