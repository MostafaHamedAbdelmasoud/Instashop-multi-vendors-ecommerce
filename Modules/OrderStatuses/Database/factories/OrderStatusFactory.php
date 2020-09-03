<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Accounts\Entities\Helpers\helpers;
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

$factory->define(OrderStatus::class, function (Faker $faker) {
    $h = new helpers();

    return [
        'name:en' => 'ready_to_deliver',
        'name:ar' => 'جاهز للتسليم',
        'type' => 'progress',
    ];
});
