<?php

namespace Modules\Orders\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Orders\Entities\Order;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bar = $this->command->getOutput()->createProgressBar(
            count($this->products())
        );

        $bar->start();

        foreach ($this->products() as $product) {
            factory(Order::class)->create($product);
            $bar->advance();
        }

        $bar->finish();
        $this->command->info("\n");
    }

    private function products()
    {
        return [
            [
                'name:ar' => ' منتج 1',
                'name:en' => 'product 1',
                'description:ar' => 'وصف منتج 1',
                'description:en' => 'product description 1',
                'meta_description:ar' => 'وصف مختصر منتج 1',
                'meta_description:en' => 'product brifely description 1',
            ],
        ];
    }
}
