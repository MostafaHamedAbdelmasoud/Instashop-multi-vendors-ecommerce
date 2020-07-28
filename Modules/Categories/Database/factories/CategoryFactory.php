<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Faker\Generator as Faker;
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

$factory->define(Category::class, function (Faker $faker) {
    $h = new helpers();

    return [
        'published_at' => $faker->dateTimeThisYear($max = 'now', $timezone = null),
        'store_id' => $h->random_or_create(Store::class)->id,
        'name:en' => $faker->word . $faker->randomDigit,
        'name:ar' => 'قسم '.$faker->randomDigit,
    ];
});



//
//$factory->afterCreating(Category::class, function (Category $category) {
//    factory(\Modules\Products\Entities\Product::class)->create([
//        'category_id' => $category->id,
//    ]);
//});
