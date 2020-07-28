<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Stores\Entities\Store;
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
$factory->define(Store::class, function (Faker $faker) {
    $h = new helpers();

    return [
        'name:en' => $faker->company,
        'name:ar' => $faker->company,
        'rate' => $faker->biasedNumberBetween($min = 0, $max = 100),
        'is_verified' => $faker->boolean,
        'plan' => 'free_plan',
        'domain' => $faker->domainName,
        'description:en' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'description:ar' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'meta_description:ar' => $faker->text($maxNbChars = 200),
        'meta_description:en' => $faker->text($maxNbChars = 200),
        'keywords:en' => $faker->word,
        'keywords:ar' => $faker->word,
        'owner_id' => $h->random_or_create(\Modules\Accounts\Entities\StoreOwner::class)->id,
    ];
});

//$factory->afterCreating(\Modules\Stores\Entities\Store::class, function (\Modules\Stores\Entities\Store $store) {
//    factory(\Modules\Products\Entities\Product::class)->create([
//        'store_id' => $store->id,
//    ]);
//});
