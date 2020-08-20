<?php

namespace Modules\Coupons\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Coupons\Entities\Coupon;

class CouponTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bar = $this->command->getOutput()->createProgressBar(
            count($this->coupons())
        );

        $bar->start();

        foreach ($this->coupons() as $coupon) {
            factory(Coupon::class)->create($coupon);
            $bar->advance();
        }

        $bar->finish();
        $this->command->info("\n");
    }

    private function coupons()
    {
        return [
            [
                'code' => 'An3324',
                'fixed_discount' => 12.0,
                'percentage_discount' => 0.12,
                'max_usage_per_order' => 1,
                'max_usage_per_user' => 2,
                'min_total' => 1000.5,
            ],
        ];
    }
}
