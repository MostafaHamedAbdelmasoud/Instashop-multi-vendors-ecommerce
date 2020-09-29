<?php

namespace Modules\OrderProducts\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\OrderProducts\Entities\OrderProduct;
use Modules\OrderProducts\Entities\OrderProductFieldValue;

class OrderProductFieldValueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bar = $this->command->getOutput()->createProgressBar(
            count($this->orderProductFieldValues())
        );

        $bar->start();

        foreach ($this->orderProductFieldValues() as $orderProductFieldValue) {
            factory(OrderProductFieldValue::class)->create($orderProductFieldValue);
            $bar->advance();
        }

        $bar->finish();
        $this->command->info("\n");
    }

    private function orderProductFieldValues()
    {
        return [
            [
                'order_product_id' => 1,
                'custom_field_id' => 1,
                'option_id' => 1,
                'additional_price' => 12.0,
                'value' => 'blue',
            ],
            [
                'order_product_id' => 1,
                'custom_field_id' => 1,
                'option_id' => 1,
                'additional_price' => 13.0,
                'value' => 'red',
            ],

        ];
    }
}
