<?php

namespace Modules\CustomFields\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\CustomFields\Entities\CustomField;

class CustomFieldTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bar = $this->command->getOutput()->createProgressBar(
            count($this->custom_fields())
        );

        $bar->start();

        foreach ($this->custom_fields() as $product) {
            factory(CustomField::class)->create($product);
            $bar->advance();
        }

        $bar->finish();
        $this->command->info("\n");
    }

    private function custom_fields()
    {
        return [
            [
                'name:ar' => 'حقل 1',
                'name:en' => 'custom field 1',
                'store_id' => 1,
                'category_id' => 1,
            ],
        ];
    }
}
