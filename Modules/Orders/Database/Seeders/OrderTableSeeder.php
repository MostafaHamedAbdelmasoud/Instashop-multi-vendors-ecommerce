<?php

namespace Modules\Orders\Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Modules\Orders\Entities\Order;
use Modules\Coupons\Entities\Coupon;
use Modules\Accounts\Entities\Address;
use Modules\Accounts\Entities\Customer;
use Modules\Accounts\Entities\Helpers\helpers;
use Modules\Accounts\Entities\ShippingCompany;

/**
 * Class OrderTableSeeder.
 */
class OrderTableSeeder extends Seeder
{
    /**
     * new helpers.
     *
     * @var h
     */
    private $h;

    /**
     * @var faker to generate random values
     */
    private $faker;

    /**
     * @var subtotal to get subtotal
     */
    private $subtotal;

    /**
     * @var discount to get subtotal
     */
    private $discount;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->h = new helpers();

        $this->faker = Faker::create();

        $this->subtotal = $this->faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = 4000);

        $this->discount = $this->faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = 100);

        $bar = $this->command->getOutput()->createProgressBar(
            count($this->orders())
        );

        $bar->start();

        foreach ($this->orders() as $order) {
            factory(Order::class)->create($order);
            $bar->advance();
        }

        $bar->finish();
        $this->command->info("\n");
    }

    /**
     * @return array[]
     */
    private function orders()
    {
        return [
            [
                'user_id' => $this->h->random_or_create(Customer::class)->id,
                'address_id' => $this->h->random_or_create(Address::class)->id,
                'coupon_id' => $this->h->random_or_create(Coupon::class)->id,
                'shipping_company_id' => $this->h->random_or_create(ShippingCompany::class)->id,
                'shipping_company_notes' => $this->faker->sentence($nbWords = 100, $variableNbWords = true),
                'subtotal' => $this->subtotal,
                'discount' => $this->discount,
                'total' => $this->subtotal - ($this->subtotal * $this->discount / 100),
            ],
            [
                'user_id' => $this->h->random_or_create(Customer::class)->id,
                'address_id' => $this->h->random_or_create(Address::class)->id,
                'coupon_id' => $this->h->random_or_create(Coupon::class)->id,
                'shipping_company_id' => $this->h->random_or_create(ShippingCompany::class)->id,
                'shipping_company_notes' => $this->faker->sentence($nbWords = 100, $variableNbWords = true),
                'subtotal' => $this->subtotal,
                'discount' => $this->discount,
                'total' => $this->subtotal - ($this->subtotal * $this->discount / 100),
            ],
        ];
    }
}
