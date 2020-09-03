<?php

namespace Modules\Categories\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Categories\Entities\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bar = $this->command->getOutput()->createProgressBar(
            count($this->categories())
        );

        $bar->start();

        foreach ($this->categories() as $category) {
            factory(Category::class)->create($category);
            $bar->advance();
        }

        $bar->finish();
        $this->command->info("\n");
    }

    private function categories()
    {
        return [
            [
                'name:ar' => ' فئة 1',
                'name:en' => 'category 1',
            ],
            [
                'name:ar' => ' فئة 2',
                'name:en' => 'category 2',
            ],
        ];
    }
}
