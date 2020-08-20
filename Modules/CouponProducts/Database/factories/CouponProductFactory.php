<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Stores\Entities\Store;
use Modules\Coupons\Entities\Coupon;
use Modules\Products\Entities\Product;
use Modules\Categories\Entities\Category;
use Modules\Accounts\Entities\Helpers\helpers;
use Modules\CouponProducts\Entities\CouponProduct;

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

$factory->define(CouponProduct::class, function (Faker $faker) {
    $h = new helpers();

    return [
        'coupon_id' => $h->random_or_create(Coupon::class)->id,
        'model_type' => 'product',
        'model_id' => $h->random_or_create(Product::class)->id,
        'type' => 'included',
        ];
});
