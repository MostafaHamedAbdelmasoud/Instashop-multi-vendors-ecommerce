<?php

namespace Modules\OrderStatuses\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\OrderStatuses\Entities\OrderStatus;

/**
 * Class OrderTableSeeder.
 */
class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bar = $this->command->getOutput()->createProgressBar(
            count($this->order_statuses())
        );

        $bar->start();

        foreach ($this->order_statuses() as $orderStatus) {
            factory(OrderStatus::class)->create($orderStatus);
            $bar->advance();
        }

        $bar->finish();
        $this->command->info("\n");
    }

    /**
     * @return array[]
     */
    private function order_statuses()
    {
        return [
            [
                'name:en' => 'ready_to_deliver',
                'name:ar' => 'جاهز للتسليم',
                'type' => 'done',
            ],

        ];
    }
}
