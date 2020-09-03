<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Orders\Entities\Order;
use Modules\Products\Entities\Product;
use Modules\Accounts\Entities\Helpers\helpers;
use Modules\OrderProducts\Entities\OrderProduct;

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

$factory->define(OrderProduct::class, function (Faker $faker) {
    $h = new helpers();
    $price = $faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = 2000.00);
    $quantity = $faker->numberBetween($min = 1, $max = 1000);
    $total = $price * $quantity;

    return [
        'product_id' => $h->random_or_create(Product::class)->id,
        'order_id' => $h->random_or_create(Order::class)->id,
        'price' => $price,
        'quantity' => $quantity,
        'total' => $total,
    ];
});
