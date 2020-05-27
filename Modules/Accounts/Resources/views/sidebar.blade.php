@component('dashboard::layouts.components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \Modules\Accounts\Entities\User::class])
    @slot('url', 'shipping_company_owners')
    @slot('name', trans('accounts::users.plural'))
    @slot('isActive', request()->routeIs('accounts*'))
    @slot('icon', 'fas fa-users')
    @slot('tree', [
        [
            'name' => trans('accounts::admins.plural'),
            'url' => route('dashboard.admins.index'),
            'can' => ['ability' => 'create', 'model' => \Modules\Accounts\Entities\Admin::class],
            'isActive' => request()->routeIs('*admins*'),
        ],
        [
            'name' => trans('accounts::customers.plural'),
            'url' => route('dashboard.customers.index'),
            'can' => ['ability' => 'create', 'model' => \Modules\Accounts\Entities\Customer::class],
            'isActive' => request()->routeIs('*customers*'),
        ],
        [
            'name' => trans('accounts::delegates.plural'),
            'url' => route('dashboard.delegates.index'),
            'can' => ['ability' => 'create', 'model' => \Modules\Accounts\Entities\Delegate::class],
            'isActive' => request()->routeIs('*delegate*'),
        ],
        [
            'name' => trans('accounts::store_owners.plural'),
            'url' => route('dashboard.store_owners.index'),
            'can' => ['ability' => 'create', 'model' => \Modules\Accounts\Entities\StoreOwner::class],
            'isActive' => request()->routeIs('*store_owner*'),
        ],
        [
            'name' => trans('accounts::supervisors.plural'),
            'url' => route('dashboard.supervisors.index'),
            'can' => ['ability' => 'create', 'model' => \Modules\Accounts\Entities\Supervisor::class],
            'isActive' => request()->routeIs('*supervisor*'),
        ],
        [
            'name' => trans('accounts::shipping_company_owners.plural'),
            'url' => route('dashboard.shipping_company_owners.index'),
            'can' => ['ability' => 'create', 'model' => \Modules\Accounts\Entities\ShippingCompanyOwner::class],
            'isActive' => request()->routeIs('*shipping_company_owner*'),
        ],
    ])
@endcomponent
