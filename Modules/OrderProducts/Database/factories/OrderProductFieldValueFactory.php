<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Accounts\Entities\Helpers\helpers;
use Modules\CustomFields\Entities\CustomField;
use Modules\OrderProducts\Entities\OrderProduct;
use Modules\CustomFieldOptions\Entities\CustomFieldOption;
use Modules\OrderProducts\Entities\OrderProductFieldValue;

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

$factory->define(OrderProductFieldValue::class, function (Faker $faker) {
    $h = new helpers();

    return [
        'order_product_id' => $h->random_or_create(OrderProduct::class)->id,
        'custom_field_id' => $h->random_or_create(CustomField::class)->id,
        'additional_price' => $faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = 2000.00),
        'option_id' => $h->random_or_create(CustomFieldOption::class)->id,
        'value' => 'yellow',
    ];
});
