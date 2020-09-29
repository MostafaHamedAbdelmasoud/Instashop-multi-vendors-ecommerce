<?php

use Illuminate\Database\Seeder;
use Modules\Offers\Database\Seeders\OfferTableSeeder;
use Modules\Orders\Database\Seeders\OrderTableSeeder;
use Modules\Stores\Database\Seeders\StoresTableSeeder;
use Modules\Coupons\Database\Seeders\CouponTableSeeder;
use Modules\Products\Database\Seeders\ProductTableSeeder;
use Modules\Categories\Database\Seeders\CategoriesTableSeeder;
use Modules\CustomFields\Database\Seeders\CustomFieldTableSeeder;
use Modules\Orders\Database\Seeders\OrderStatusUpdateTableSeeder;
use Modules\OrderStatuses\Database\Seeders\OrderStatusTableSeeder;
use Modules\Accounts\Database\Seeders\ShippingCompaniesTableSeeder;
use Modules\OrderProducts\Database\Seeders\OrderProductTableSeeder;
use Modules\Subscriptions\Database\Seeders\SubscriptionTableSeeder;
use Modules\CouponProducts\Database\Seeders\CouponProductTableSeeder;
use Modules\CustomFieldOptions\Database\Seeders\CustomFieldOptionTableSeeder;
use Modules\OrderProducts\Database\Seeders\OrderProductFieldValueTableSeeder;

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
        $this->call(ShippingCompaniesTableSeeder::class);
        $this->call(StoresTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(CustomFieldTableSeeder::class);
        $this->call(CustomFieldOptionTableSeeder::class);
        $this->call(SubscriptionTableSeeder::class);
        $this->call(CouponTableSeeder::class);
        $this->call(CouponProductTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(OrderProductTableSeeder::class);
        $this->call(OrderStatusTableSeeder::class);
        $this->call(OrderStatusUpdateTableSeeder::class);
        $this->call(OrderProductFieldValueTableSeeder::class);
        $this->call(OfferTableSeeder::class);
    }
}
