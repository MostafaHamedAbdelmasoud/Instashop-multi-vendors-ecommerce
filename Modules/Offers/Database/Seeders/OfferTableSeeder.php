<?php

namespace Modules\Offers\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Offers\Entities\Offer;

class OfferTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bar = $this->command->getOutput()->createProgressBar(
            count($this->Offers())
        );

        $bar->start();

        foreach ($this->Offers() as $offer) {
            factory(Offer::class)->create($offer);
            $bar->advance();
        }

        $bar->finish();
        $this->command->info("\n");
    }

    private function Offers()
    {
        return [
            [
                'fixed_discount_price' => 25.0,
                'percentage_discount_price' => 88,
                'expire_at' => \Carbon\Carbon::now()->addDays(5),
                'name:ar' => 'عرض 10%',
                'name:en' => 'Offer 10%',
            ],
            [
                'fixed_discount_price' => 25.0,
                'percentage_discount_price' => 88,
                'expire_at' => \Carbon\Carbon::now()->addDays(3),
                'name:ar' => 'عرض 20%',
                'name:en' => 'Offer 20%',
            ],

        ];
    }
}
