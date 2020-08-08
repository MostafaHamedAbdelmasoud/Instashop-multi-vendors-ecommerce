<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Modules\Products\Entities\Product;
use Modules\Accounts\Entities\Helpers\helpers;
use Modules\CustomFields\Entities\CustomField;
use Modules\CustomFieldOptions\Entities\CustomFieldOption;

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

$factory->define(CustomFieldOption::class, function (Faker $faker) {
    $h = new helpers();

    return [
        'product_id' => $h->random_or_create(Product::class)->id,
        'custom_field_id' => $h->random_or_create(CustomField::class)->id,
        'additional_price' => 10.2,
        'name:en' => $faker->word . $faker->randomDigit,
        'name:ar' => 'حقل '.$faker->randomDigit,
    ];
});


//$factory->afterCreating(Category::class, function (Category $category) {
//    if ($category->id >=2) {
//        return;
//    }
//    factory(Category::class)->create([
//        'parent_id' => $category->id,
//    ]);
//});
