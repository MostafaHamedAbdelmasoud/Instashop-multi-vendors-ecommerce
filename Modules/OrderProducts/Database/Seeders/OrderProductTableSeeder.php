<?php

namespace Modules\OrderProducts\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\OrderProducts\Entities\OrderProduct;

class OrderProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bar = $this->command->getOutput()->createProgressBar(
            count($this->orderProducts())
        );

        $bar->start();

        foreach ($this->orderProducts() as $orderProduct) {
            factory(OrderProduct::class)->create($orderProduct);
            $bar->advance();
        }

        $bar->finish();
        $this->command->info("\n");
    }

    private function orderProducts()
    {
        return [
            [
                'product_id' => 1,
                'order_id' => 1,
                'price'=>12.0,
                'quantity'=>2,
                'total'=>24.0,
            ],
             [
                 'product_id' => 2,
                 'order_id' => 1,
                 'price'=>13.0,
                 'quantity'=>2,
                 'total'=>26.0,
            ],

        ];
    }
}
