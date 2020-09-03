<?php

namespace Modules\Products\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Products\Entities\Product;

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
            factory(Product::class)->create($product);
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
             [
                'name:ar' => ' منتج 2',
                'name:en' => 'product 2',
                'description:ar' => 'وصف منتج 2',
                'description:en' => 'product description 2',
                'meta_description:ar' => 'وصف مختصر منتج 2',
                'meta_description:en' => 'product brifely description 2',
            ],

        ];
    }
}
