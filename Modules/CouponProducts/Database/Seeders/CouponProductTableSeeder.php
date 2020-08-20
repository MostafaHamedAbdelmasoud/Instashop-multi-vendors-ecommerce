<?php

namespace Modules\CouponProducts\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\CouponProducts\Entities\CouponProduct;

class CouponProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bar = $this->command->getOutput()->createProgressBar(
            count($this->coupon_products())
        );

        $bar->start();

        foreach ($this->coupon_products() as $coupon) {
            factory(CouponProduct::class)->create($coupon);
            $bar->advance();
        }

        $bar->finish();
        $this->command->info("\n");
    }

    private function coupon_products()
    {
        return [
            [
                'coupon_id' => 1,
                'model_type' => 'product',
                'model_id' => 1,
                'type' => 'included',
            ],
            [
                'coupon_id' => 1,
                'model_type' => 'product',
                'model_id' => 2,
                'type' => 'excluded',
            ],
            [
                'coupon_id' => 1,
                'model_type' => 'category',
                'model_id' => 1,
                'type' => 'included',
            ],
        ];
    }
}
