@component('dashboard::layouts.components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \Modules\Stores\Entities\Store::class])
    @slot('url', 'stores')
    @slot('name', trans('stores::stores.plural'))
    @slot('isActive', request()->routeIs('stores*'))
    @slot('icon', 'fas fa-store')
    @slot('tree', [
        [
            'name' => trans('stores::stores.actions.list'),
            'url' => route('dashboard.stores.index'),
            'can' => ['ability' => 'viewAny', 'model' => \Modules\Stores\Entities\Store::class],
            'isActive' => request()->routeIs('*stores.index*'),
        ],
        [
            'name' => trans('stores::stores.actions.create'),
            'url' => route('dashboard.stores.create'),
            'can' => ['ability' => 'create', 'model' =>  \Modules\Stores\Entities\Store::class],
            'isActive' => request()->routeIs('*stores.create'),
        ]
    ])
@endcomponent
