<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Orders\Entities\Order;
use Modules\Stores\Entities\Store;
use Modules\Coupons\Entities\Coupon;
use Modules\Accounts\Entities\Address;
use Modules\Accounts\Entities\Customer;
use Modules\Categories\Entities\Category;
use Modules\Accounts\Entities\Helpers\helpers;
use Modules\Accounts\Entities\ShippingCompany;
use Modules\Orders\Entities\OrderStatusUpdate;
use Modules\OrderStatuses\Entities\OrderStatus;

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

$factory->define(Order::class, function (Faker $faker) {
    $h = new helpers();

    return [
        'user_id' => $h->random_or_create(Customer::class)->id,
        'address_id' => $h->random_or_create(Address::class)->id,
        'coupon_id' => $h->random_or_create(Coupon::class)->id,
        'shipping_company_id' => $h->random_or_create(ShippingCompany::class)->id,
        'shipping_company_notes' => $faker->sentence($nbWords = 100, $variableNbWords = true),
        'subtotal' => $faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = 4000),
        'discount' => $faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = 100),
        'total' => $faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = 3000),
    ];
});

//$factory->afterCreating(Order::class, function (Order $order) {
//    factory(OrderStatusUpdate::class)->create([
//        'order_id' => $order->id,
//    ]);
//});
