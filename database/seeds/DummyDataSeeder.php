<?php

use Illuminate\Database\Seeder;
use Modules\Stores\Database\Seeders\StoresTableSeeder;
use Modules\Coupons\Database\Seeders\CouponTableSeeder;
use Modules\Products\Database\Seeders\ProductTableSeeder;
use Modules\Categories\Database\Seeders\CategoriesTableSeeder;
use Modules\CustomFields\Database\Seeders\CustomFieldTableSeeder;
use Modules\Accounts\Database\Seeders\ShippingCompaniesTableSeeder;
use Modules\Subscriptions\Database\Seeders\SubscriptionTableSeeder;
use Modules\CouponProducts\Database\Seeders\CouponProductTableSeeder;
use Modules\CustomFieldOptions\Database\Seeders\CustomFieldOptionTableSeeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(ShippingCompaniesTableSeeder::class);
        $this->call(StoresTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(CustomFieldTableSeeder::class);
        $this->call(CustomFieldOptionTableSeeder::class);
        $this->call(SubscriptionTableSeeder::class);
        $this->call(CouponTableSeeder::class);
        $this->call(CouponProductTableSeeder::class);
    }
}
