# Countries Module
> This module references to [scaffolding](https://github.com/laravel-modules/scaffolding) project.

## Usage
> Clone the repository as name `Countries` and copy the module folder into `Modules` in [scaffolding](https://github.com/laravel-modules/scaffolding) project.

```bash
git clone https://github.com/laravel-modules/countries {PATH_TO_SCAFFOLDING_PROJECT}/Modules/Countries
```
> Do not forget to remove `.git` folder.

```bash
cd {PATH_TO_SCAFFOLDING_PROJECT}/Modules/Countries && rm -rf .git
```
> Add the module into `modules_statuses.json` file.
```json
{
    "Accounts": true,
    "Dashboard": true,
    "Countries": true
}
```

> Now you should to register the policy in your `AuthServiceProvider`

```php
<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        ...
        \Modules\Countries\Entities\Country::class => \Modules\Countries\Policies\CountryPolicy::class,
        \Modules\Countries\Entities\City::class => \Modules\Countries\Policies\CityPolicy::class,
    ];
    ...
```
> Add the seeders to `DummyDataSeeder`

```php
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
        ...
        $this->call(CountriesTableSeeder::class);
    }
}
```
> Add countries link to dashboard sidebar `Modules/Dashboard/Resources/views/sidebar.blade.php`

```blade
@include('countries::sidebar')
```

> Now you should update the composer packages.

```bash
composer update
```
> Migrate the tables.

```bash
php artisan migrate:fresh --seed
```