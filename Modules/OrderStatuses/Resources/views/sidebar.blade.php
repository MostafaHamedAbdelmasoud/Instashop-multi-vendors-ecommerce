@component('dashboard::layouts.components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \Modules\OrderStatuses\Entities\OrderStatus::class])
    @slot('url', 'order_statuses')
    @slot('name', trans('order_statuses::order_statuses.plural'))
    @slot('isActive', request()->routeIs('order_statuses*'))
    @slot('icon', 'fas fa-battery-three-quarters')
    @slot('tree', [
        [
            'name' => trans('order_statuses::order_statuses.actions.list'),
            'url' => route('dashboard.order_statuses.index'),
            'can' => ['ability' => 'viewAny', 'model' => \Modules\OrderStatuses\Entities\OrderStatus::class],
            'isActive' => request()->routeIs('*order_statuses.index*'),
        ],
        [
            'name' => trans('order_statuses::order_statuses.actions.create'),
            'url' => route('dashboard.order_statuses.create'),
            'can' => ['ability' => 'create', 'model' =>  \Modules\OrderStatuses\Entities\OrderStatus::class],
            'isActive' => request()->routeIs('*order_statuses.create'),
        ]
    ])
@endcomponent
