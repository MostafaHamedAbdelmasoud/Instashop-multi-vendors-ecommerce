@component('dashboard::layouts.components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \Modules\Offers\Entities\Offer::class])
    @slot('url', 'Offers')
    @slot('name', trans('offers::offers.plural'))
    @slot('isActive', request()->routeIs('Offers*'))
    @slot('icon', 'fas fa-percent')
    @slot('tree', [
        [
            'name' => trans('offers::offers.actions.list'),
            'url' => route('dashboard.Offers.index'),
            'can' => ['ability' => 'viewAny', 'model' => \Modules\Offers\Entities\Offer::class],
            'isActive' => request()->routeIs('*Offers.index*'),
        ],
        [
            'name' => trans('offers::offers.actions.create'),
            'url' => route('dashboard.Offers.create'),
            'can' => ['ability' => 'create', 'model' =>  \Modules\Offers\Entities\Offer::class],
            'isActive' => request()->routeIs('*Offers.create'),
        ]
    ])
@endcomponent
