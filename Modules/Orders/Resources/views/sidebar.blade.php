@component('dashboard::layouts.components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \Modules\Orders\Entities\Order::class])
    @slot('url', 'orders')
    @slot('name', trans('orders::orders.plural'))
    @slot('isActive', request()->routeIs('orders*'))
    @slot('icon', 'fas fa-cart-plus')
    @slot('tree', [
        [
            'name' => trans('orders::orders.actions.list'),
            'url' => route('dashboard.orders.index'),
            'can' => ['ability' => 'viewAny', 'model' => \Modules\Orders\Entities\Order::class],
            'isActive' => request()->routeIs('*orders.index*'),
        ],
        [
            'name' => trans('orders::orders.actions.create'),
            'url' => route('dashboard.orders.create'),
            'can' => ['ability' => 'create', 'model' =>  \Modules\Orders\Entities\Order::class],
            'isActive' => request()->routeIs('*orders.create'),
        ]
    ])
@endcomponent
