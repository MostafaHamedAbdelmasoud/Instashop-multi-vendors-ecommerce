<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Stores\Entities\Store;
use Modules\TemplateBanners\Entities\TemplateBanner;
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

$factory->define(TemplateBanner::class, function (Faker $faker) {
    $h = new helpers();

    return [
        'title' => $faker->word,
        'store_id' => $h->random_or_create(Store::class),
        'body' => $faker->word,
        'template' => 'page-home05',
        'position' => 'top',
        'target_type' => 'category',
        'target_id' => $h->random_or_create(Category::class),
        'url' => 'null',
        ];
});
