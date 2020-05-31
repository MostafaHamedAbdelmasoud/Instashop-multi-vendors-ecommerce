<?php

use Illuminate\Database\Seeder;

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
        $this->call(\Modules\Accounts\Database\Seeders\ShippingCompaniesTableSeeder::class);
        $this->call(\Modules\Accounts\Database\Seeders\StoresTableSeeder::class);
    }
}
