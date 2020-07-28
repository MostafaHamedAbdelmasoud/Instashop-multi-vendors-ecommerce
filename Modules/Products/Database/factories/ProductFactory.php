<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Stores\Entities\Store;
use Modules\Products\Entities\Product;
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

$factory->define(Product::class, function (Faker $faker) {
    $h = new helpers();

    return [
        'code' => $faker->md5,
        'name:en' => $faker->word,
        'name:ar' => 'منتج ' . $faker->randomDigit,
        'category_id' => $h->random_or_create(Category::class)->id,
        'store_id' => $h->random_or_create(Store::class)->id,
        'price' => $faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = 2000.00),
        'old_price' => $faker->randomFloat($nbMaxDecimals = null, $min = 110, $max = 2000.00),
        'weight' => $faker->numberBetween($min = 100, $max = 2000),
        'stock' => $faker->numberBetween($min = 5, $max = 20),
        'description:en' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'description:ar' => 'وصف منتج ' . $faker->sentence($nbWords = 10, $variableNbWords = true),
        'meta_description:en' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'meta_description:ar' => 'وصف ملخص منتج ' . $faker->sentence($nbWords = 4, $variableNbWords = true),
    ];
});
