<?php

namespace Modules\Accounts\Database\Seeders;

namespace Modules\Accounts\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Accounts\Entities\ShippingCompany;
use Modules\Accounts\Entities\ShippingCompanyPrice;

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

//            factory(ShippingCompanyPrice::class)
//                ->create([
//                    'shipping_company_id' => $shipping_companyModel->id
//                ]);
        }
        $bar->finish();
        $this->command->info("\n");
    }

    private function shipping_companies()
    {
        return [
            [
                'name:ar' => 'شركة نقل 1',
                'name:en' => 'store 1',

            ],
            [
                'name:ar' => 'شركة نقل 2',
                'name:en' => 'store 2',
            ],
            [
                'name:ar' => 'شركة نقل 3',
                'name:en' => 'store 3',
            ],

        ];
    }
}
