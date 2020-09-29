<?php

namespace Modules\Orders\Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Modules\Orders\Entities\Order;
use Modules\Accounts\Entities\Helpers\helpers;
use Modules\Orders\Entities\OrderStatusUpdate;
use Modules\OrderStatuses\Entities\OrderStatus;

/**
 * Class OrderTableSeeder.
 */
class OrderStatusUpdateTableSeeder extends Seeder
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
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->h = new helpers();

        $this->faker = Faker::create();

        $bar = $this->command->getOutput()->createProgressBar(
            count($this->order_status_updates())
        );

        $bar->start();

        foreach ($this->order_status_updates() as $orderStatusUpdate) {
            factory(OrderStatusUpdate::class)->create($orderStatusUpdate);
            $bar->advance();
        }

        $bar->finish();
        $this->command->info("\n");
    }

    /**
     * @return array[]
     */
    private function order_status_updates()
    {
        return [
            [
                'order_id' => $this->h->random_or_create(Order::class)->id,
                'order_status_id' => $this->h->random_or_create(OrderStatus::class)->id,
                'notes' => $this->faker->sentence($nbWords = 100, $variableNbWords = true),
            ],
            [
                'order_id' => $this->h->random_or_create(Order::class)->id,
                'order_status_id' => $this->h->random_or_create(OrderStatus::class)->id,
                'notes' => $this->faker->sentence($nbWords = 100, $variableNbWords = true),
            ],
        ];
    }
}
