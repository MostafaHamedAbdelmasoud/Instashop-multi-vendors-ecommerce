<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Accounts\Entities\Helpers\helpers;
use Modules\Accounts\Entities\ShippingCompany;

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
$factory->define(\Modules\Accounts\Entities\ShippingCompanyPrice::class, function (Faker $faker) {
    $h = new helpers();

    return [
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 100),
        'city_id' => $h->random_or_create(\Modules\Countries\Entities\City::class)->id,
    ];
});
