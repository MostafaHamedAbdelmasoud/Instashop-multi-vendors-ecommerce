@component('dashboard::layouts.components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \Modules\Products\Entities\Product::class])
    @slot('url', 'products')
    @slot('name', trans('products::products.plural'))
    @slot('isActive', request()->routeIs('products*'))
    @slot('icon', 'fas fa-box-open')
    @slot('tree', [
        [
            'name' => trans('products::products.actions.list'),
            'url' => route('dashboard.products.index'),
            'can' => ['ability' => 'viewAny', 'model' => \Modules\Products\Entities\Product::class],
            'isActive' => request()->routeIs('*products.index*'),
        ],
        [
            'name' => trans('products::products.actions.create'),
            'url' => route('dashboard.products.create'),
            'can' => ['ability' => 'create', 'model' =>  \Modules\Products\Entities\Product::class],
            'isActive' => request()->routeIs('*products.create'),
        ]
    ])
@endcomponent
