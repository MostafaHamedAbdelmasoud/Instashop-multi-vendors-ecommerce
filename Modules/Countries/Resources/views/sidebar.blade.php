@component('dashboard::layouts.components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \Modules\Countries\Entities\Country::class])
    @slot('url', route('dashboard.countries.index'))
    @slot('name', trans('countries::countries.plural'))
    @slot('isActive', request()->routeIs('*countries*'))
    @slot('icon', 'fas fa-flag')
    @slot('tree', [
        [
            'name' => trans('countries::countries.actions.list'),
            'url' => route('dashboard.countries.index'),
            'can' => ['ability' => 'viewAny', 'model' => \Modules\Countries\Entities\Country::class],
            'isActive' => request()->routeIs('*countries.index'),
        ],
        [
            'name' => trans('countries::countries.actions.create'),
            'url' => route('dashboard.countries.create'),
            'can' => ['ability' => 'create', 'model' => \Modules\Countries\Entities\Country::class],
            'isActive' => request()->routeIs('*countries.create'),
        ],
    ])
@endcomponent
