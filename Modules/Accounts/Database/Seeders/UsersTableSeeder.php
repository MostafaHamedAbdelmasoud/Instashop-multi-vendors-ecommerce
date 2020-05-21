<?php

use Illuminate\Database\Seeder;
use  Modules\Accounts\Entities\Admin;
use Modules\Accounts\Entities\Supervisor;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\Modules\Accounts\Entities\Admin::class)->create([
            'name' => 'Taylor Otwell',
            'email' => 'taylor@laravel.com',
        ]);
        factory(\Modules\Accounts\Entities\Admin::class)->create([
            'name' => 'Mohamed Said',
            'email' => 'themsaid@gmail.com',
        ]);

        factory(\Modules\Accounts\Entities\Admin::class)->create([
            'name' => 'Dries Vints',
            'email' => 'dries.vints@gmail.com',
        ]);

        factory(\Modules\Accounts\Entities\Customer::class)->create([
            'name' => 'Jeffrey Way',
            'email' => 'jeffrey@laracasts.com',
        ]);
        factory(\Modules\Accounts\Entities\Customer::class)->create([
            'name' => 'Tom Witkowski',
            'email' => 'dev.gummibeer@gmail.com',
        ]);
        factory(\Modules\Accounts\Entities\Customer::class)->create([
            'name' => 'Jonas Staudenmeir',
            'email' => 'mail@jonas-staudenmeir.de',
        ]);
        factory(\Modules\Accounts\Entities\Customer::class)->create([
            'name' => 'Freek Van der Herten',
            'email' => 'freek@spatie.be',
        ]);
        factory(\Modules\Accounts\Entities\Customer::class)->create([
            'name' => 'Raphael Jackstadt',
            'email' => 'info@rejack.de',
        ]);
        factory(\Modules\Accounts\Entities\Customer::class)->create([
            'name' => 'Weblate (bot)',
            'email' => 'hosted@weblate.org',
        ]);
        factory(\Modules\Accounts\Entities\StoreOwner::class)->create([
            'name' => 'alice (bot)',
            'email' => 'alice@toptal.org',
        ]);
        factory(\Modules\Accounts\Entities\StoreOwner::class)->create([
            'name' => 'pop (bot)',
            'email' => 'pop@eng.org',
        ]);
        factory(\Modules\Accounts\Entities\StoreOwner::class)->create([
            'name' => 'adam (bot)',
            'email' => 'adam@asu.org',
        ]);
        factory(\Modules\Accounts\Entities\Supervisor::class)->create([
            'name' => 'ahmed Ali',
            'email' => 'ahmed@habra.org',
        ]);
        factory(\Modules\Accounts\Entities\Supervisor::class)->create([
            'name' => 'mahmoud fawzy',
            'email' => 'mahmoud@super.org',
        ]);
        factory(\Modules\Accounts\Entities\Supervisor::class)->create([
            'name' => 'andre madarang',
            'email' => 'andre@madarang.org',
        ]);
        factory(\Modules\Accounts\Entities\ShippingCompanyOwner::class)->create([
            'name' => 'fedex owner',
            'email' => 'fedex@shipping.org',
        ]);
        factory(\Modules\Accounts\Entities\ShippingCompanyOwner::class)->create([
            'name' => 'otlob owner',
            'email' => 'otlob@shipping.org',
        ]);
        factory(\Modules\Accounts\Entities\Delegate::class)->create([
            'name' => 'mandoob',
            'email' => 'mandoob@motahda.org',
        ]);
        factory(\Modules\Accounts\Entities\Delegate::class)->create([
            'name' => 'mandoob2',
            'email' => 'mandoob2@motahda.org',
        ]);
        factory(\Modules\Accounts\Entities\Delegate::class)->create([
            'name' => 'mandoob3',
            'email' => 'mandoob3@motahda.org',
        ]);
    }
}
