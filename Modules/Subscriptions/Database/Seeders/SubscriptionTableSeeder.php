<?php

namespace Modules\Subscriptions\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Stores\Entities\Store;
use Modules\Accounts\Entities\Helpers\helpers;
use Modules\Accounts\Entities\ShippingCompany;
use Modules\Subscriptions\Entities\Subscription;

/**
 * Class SubscriptionTableSeeder.
 */
class SubscriptionTableSeeder extends Seeder
{

    /**
     * to assign Helper Class to it.
     *
     * @var helper
     */
    private $helper;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->helper = new helpers();

        $bar = $this->command->getOutput()->createProgressBar(
            count($this->subscription())
        );

        $bar->start();

        foreach ($this->subscription() as $subscription) {
            factory(Subscription::class)->create($subscription);
            $bar->advance();
        }

        $bar->finish();
        $this->command->info("\n");
    }

    /**
     * create or return random store.
     *
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Databasex\Eloquent\Collection|mixed
     */
    private function create_store()
    {
        return $this->helper->random_or_create(Store::class);
    }

    /**
     * create or return random Shipping Company.
     *
     */
    private function create_shipping_company()
    {
        return $this->helper->random_or_create(ShippingCompany::class);
    }

    /**
     * @return \string[][]
     */
    private function subscription()
    {
        return [
            [
                'model_id' => $this->create_store()->id,
                'model_type' => 'store',
            ],
            [
                'model_id' => $this->create_shipping_company()->id,
                'model_type' => 'shipping_company',
            ],
        ];
    }
}
