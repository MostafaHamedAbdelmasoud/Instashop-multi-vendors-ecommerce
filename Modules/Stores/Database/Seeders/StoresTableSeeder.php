<?php

namespace Modules\Stores\Database\Seeders;

use Illuminate\Database\Seeder;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bar = $this->command->getOutput()->createProgressBar(
            count($this->stores())
        );

        $bar->start();

        foreach ($this->stores() as $store) {
            factory(\Modules\Stores\Entities\Store::class)->create($store);
            $bar->advance();
        }

        $bar->finish();
        $this->command->info("\n");
    }

    private function stores()
    {
        return [
            [
                'name:ar' => ' متجر 1',
                'name:en' => 'store 1',
                'description:ar' => 'وصف 1',
                'description:en' => 'description 1',
                'meta_description:ar' => 'وصف مختصر 1',
                'meta_description:en' => 'brief description 1',
                'keywords:en' => 'keyword 1',
                'keywords:ar' => 'كلمات 1',
            ],
            [
                'name:ar' => ' متجر 2',
                'name:en' => 'store 2',
                'description:ar' => 'وصف 2',
                'description:en' => 'description 2',
                'meta_description:ar' => 'وصف مختصر 2',
                'meta_description:en' => 'brief description 2',
                'keywords:en' => 'keyword 2',
                'keywords:ar' => 'كلمات 2',
            ],
            [
                'name:ar' => ' متجر 3',
                'name:en' => 'store 3',
                'description:ar' => 'وصف 3',
                'description:en' => 'description 3',
                'meta_description:ar' => 'وصف مختصر 3',
                'meta_description:en' => 'brief description 3',
                'keywords:en' => 'keyword 3',
                'keywords:ar' => 'كلمات 3',
            ],

        ];
    }
}
