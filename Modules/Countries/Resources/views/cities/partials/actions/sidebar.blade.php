@component('dashboard::layouts.components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \Modules\Countries\Entities\City::class])
    @slot('url', route('dashboard.cities.index'))
    @slot('name', trans('countries::cities.plural'))
    @slot('routeActive', '*cities*')
    @slot('icon', 'fas fa-city')
    @slot('tree', [
        [
            'name' => trans('countries::cities.actions.list'),
            'url' => route('dashboard.cities.index'),
            'can' => ['ability' => 'viewAny', 'model' => \Modules\Countries\Entities\City::class],
            'routeActive' => '*cities.index',
        ],
        [
            'name' => trans('countries::cities.actions.create'),
            'url' => route('dashboard.cities.create'),
            'can' => ['ability' => 'create', 'model' => \Modules\Countries\Entities\City::class],
            'routeActive' => '*cities.create',
        ],
    ])
@endcomponent
