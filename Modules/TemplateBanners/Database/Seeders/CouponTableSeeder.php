<?php

namespace Modules\TemplateBanners\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\TemplateBanners\Entities\TemplateBanner;

class CouponTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bar = $this->command->getOutput()->createProgressBar(
            count($this->template_banners())
        );

        $bar->start();

        foreach ($this->template_banners() as $templateBanner) {
            factory(TemplateBanner::class)->create($templateBanner);
            $bar->advance();
        }

        $bar->finish();
        $this->command->info("\n");
    }

    private function template_banners()
    {
        return [
            [
                'code' => 'An3324',
                'fixed_discount' => 12.0,
                'percentage_discount' => 0.12,
                'max_usage_per_order' => 1,
                'max_usage_per_user' => 2,
                'min_total' => 1000.5,
            ],
        ];
    }
}
