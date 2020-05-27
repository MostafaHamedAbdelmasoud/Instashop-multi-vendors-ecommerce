<?php

namespace Modules\Accounts\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Accounts\Entities\ShippingCompany;

class ShippingCompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bar = $this->command->getOutput()->createProgressBar(
            count($this->shipping_companies())
        );

        $bar->start();

        foreach ($this->shipping_companies() as $shipping_company) {
            /** @var \Modules\Countries\Entities\Country $shipping_companyModel */
            $shipping_companyModel = factory(ShippingCompany::class)
                ->create($shipping_company);
        }
        $bar->finish();
        $this->command->info("\n");
    }

    private function shipping_companies()
    {
        return [
            [
                'name:ar' => 'متجر1',
                'name:en' => 'store1',

            ],
            [
                'name:ar' => 'متجر1',
                'name:en' => 'store2',
            ],
            [
                'name:ar' => 'متجر3',
                'name:en' => 'store3',
            ],

        ];
    }
}
