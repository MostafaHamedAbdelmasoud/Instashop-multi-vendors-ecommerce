<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Accounts\Entities\Helpers\helpers;
use Modules\Accounts\Entities\ShippingCompany;

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
$factory->define(ShippingCompany::class, function (Faker $faker) {
    $h = new helpers();
//    $owner = \Modules\Accounts\Entities\ShippingCompanyOwner::first();
    return [
        'owner_id' => $h->random_or_create(\Modules\Accounts\Entities\ShippingCompanyOwner::class)->id,


    ];
});

$factory->afterCreating(ShippingCompany::class, function (ShippingCompany $shippingCompany) {
    factory(\Modules\Accounts\Entities\ShippingCompanyPrice::class)->create([
        'shipping_company_id' => $shippingCompany->id,
    ]);
});


