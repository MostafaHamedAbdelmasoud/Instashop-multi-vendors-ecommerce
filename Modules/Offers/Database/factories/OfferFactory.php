<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Offers\Entities\Offer;
use Modules\Stores\Entities\Store;
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

$factory->define(Offer::class, function (Faker $faker) {
    $h = new helpers();
    $category = $h->random_or_create(Category::class);

    return [
        'fixed_discount_price' => $faker->randomFloat($nbMaxDecimals = 4, $min = 0, $max = 1000),
        'percentage_discount_price' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max = 100),
        'model_type' => 'category',
        'model_id' => $category->id,
        'expire_at' => \Carbon\Carbon::now()->addDays(5),
        'name:ar' => 'عرض 10%',
        'name:en' => 'Offer 10%',
        ];
});
