@component('dashboard::layouts.components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \Modules\OrderProducts\Entities\OrderProduct::class])
    @slot('url', 'order_products')
    @slot('name', trans('order_products::order_products.plural'))
    @slot('isActive', request()->routeIs('order_products*'))
    @slot('icon', 'fas fa-box-open')
    @slot('tree', [
        [
            'name' => trans('order_products::order_products.actions.list'),
            'url' => route('dashboard.order_products.index'),
            'can' => ['ability' => 'viewAny', 'model' => \Modules\OrderProducts\Entities\OrderProduct::class],
            'isActive' => request()->routeIs('*order_products.index*'),
        ],
        [
            'name' => trans('order_products::order_products.actions.create'),
            'url' => route('dashboard.order_products.create'),
            'can' => ['ability' => 'create', 'model' =>  \Modules\OrderProducts\Entities\OrderProduct::class],
            'isActive' => request()->routeIs('*order_products.create'),
        ]
    ])
@endcomponent
