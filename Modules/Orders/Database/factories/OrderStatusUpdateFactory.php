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

$factory->define(OrderStatusUpdate::class, function (Faker $faker) {
    $h = new helpers();

    return [
        'order_id' => $h->random_or_create(Order::class)->id,
        'order_status_id' => $h->random_or_create(OrderStatus::class)->id,
        'notes' => $faker->sentence($nbWords = 100, $variableNbWords = true),
       ];
});
