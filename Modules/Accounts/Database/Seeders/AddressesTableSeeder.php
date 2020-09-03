<?php


use Illuminate\Database\Seeder;
use Modules\Accounts\Entities\User;
use Modules\Accounts\Entities\Customer;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersIDs = Customer::pluck('id');
        $cnt =0;
        foreach ($usersIDs as $usersID) {
            factory(\Modules\Accounts\Entities\Address::class)->create([
                'user_id' => $usersID,
                'city_id' => ++$cnt,
            ]);
            factory(\Modules\Accounts\Entities\Address::class)->create([
                'user_id' => $usersID,
                'city_id' => $cnt,
            ]);
        }
    }
}
