<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Stores\Entities\Store;
use Modules\Coupons\Entities\Coupon;
use Modules\Categories\Entities\Category;
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

$factory->define(Coupon::class, function (Faker $faker) {
    $h = new helpers();

    return [
        'code' => $faker->md5,
        'fixed_discount' => $faker->randomFloat($nbMaxDecimals = 4, $min = 0, $max = 1000),
        'percentage_discount' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max = 100),
        'max_usage_per_order' => $faker->numberBetween($min = 1, $max = 2),
        'max_usage_per_user' => $faker->numberBetween($min = 1, $max = 3),
        'min_total' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max = 10000),
        ];
});
