@component('dashboard::layouts.components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \Modules\Offers\Entities\Offer::class])
    @slot('url', 'offers')
    @slot('name', trans('offers::offers.plural'))
    @slot('isActive', request()->routeIs('offers*'))
    @slot('icon', 'fas fa-percent')
    @slot('tree', [
        [
            'name' => trans('offers::offers.actions.list'),
            'url' => route('dashboard.offers.index'),
            'can' => ['ability' => 'viewAny', 'model' => \Modules\Offers\Entities\Offer::class],
            'isActive' => request()->routeIs('*offers.index*'),
        ],
        [
            'name' => trans('offers::offers.actions.create_product_offer'),
            'url' => route('dashboard.offers.create_product_offer'),
            'can' => ['ability' => 'create', 'model' =>  \Modules\Offers\Entities\Offer::class],
            'isActive' => request()->routeIs('*offers.create'),
        ],
        [
            'name' => trans('offers::offers.actions.create_category_offer'),
            'url' => route('dashboard.offers.create_category_offer'),
            'can' => ['ability' => 'create', 'model' =>  \Modules\Offers\Entities\Offer::class],
            'isActive' => request()->routeIs('*offers.create'),
        ],
        [
            'name' => trans('offers::offers.actions.create_store_offer'),
            'url' => route('dashboard.offers.create_store_offer'),
            'can' => ['ability' => 'create', 'model' =>  \Modules\Offers\Entities\Offer::class],
            'isActive' => request()->routeIs('*offers.create'),
        ]
    ])
@endcomponent
