<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Accounts\Entities\Helpers\helpers;
use Modules\Accounts\Entities\ShippingCompany;
use Modules\Accounts\Entities\ShippingCompanyPrice;

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

    return [
        'owner_id' => $h->random_or_create(\Modules\Accounts\Entities\ShippingCompanyOwner::class)->id,
        'name:ar' => 'hello ar '.$faker->company,
        'name:en' => 'hello en ' .$faker->company,

    ];
});

$factory->afterCreating(ShippingCompany::class, function (ShippingCompany $shippingCompany) {
    factory(ShippingCompanyPrice::class)->create([
        'shipping_company_id' => $shippingCompany->id,
    ]);
});
