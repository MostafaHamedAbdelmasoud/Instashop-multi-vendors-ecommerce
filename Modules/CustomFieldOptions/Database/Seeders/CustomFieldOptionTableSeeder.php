<?php

namespace Modules\CustomFieldOptions\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\CustomFieldOptions\Entities\CustomFieldOption;

class CustomFieldOptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bar = $this->command->getOutput()->createProgressBar(
            count($this->custom_field_options())
        );

        $bar->start();

        foreach ($this->custom_field_options() as $product) {
            factory(CustomFieldOption::class)->create($product);
            $bar->advance();
        }

        $bar->finish();
        $this->command->info("\n");
    }

    private function custom_field_options()
    {
        return [
            [
                'name:ar' => 'خاصية حقل 1',
                'name:en' => 'custom field Option 1',
                'product_id' => 1,
                'custom_field_id' => 1,
                'additional_price' => 10.2,
            ], [
                'name:ar' => 'خاصية حقل 2',
                'name:en' => 'custom field Option 2',
                'product_id' => 1,
                'custom_field_id' => 1,
                'additional_price' => 990.2,
            ],
        ];
    }
}
