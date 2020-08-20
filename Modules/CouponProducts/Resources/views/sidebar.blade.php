@component('dashboard::layouts.components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \Modules\CouponProducts\Entities\CouponProduct::class])
    @slot('url', 'coupon_products')
    @slot('name', trans('coupon_products::coupon_products.plural'))
    @slot('isActive', request()->routeIs('coupon_products*'))
    @slot('icon', 'fas fa-lock')
    @slot('tree', [
        [
            'name' => trans('coupon_products::coupon_products.actions.list'),
            'url' => route('dashboard.coupon_products.index'),
            'can' => ['ability' => 'viewAny', 'model' => \Modules\CouponProducts\Entities\CouponProduct::class],
            'isActive' => request()->routeIs('*coupon_products.index*'),
        ],
        [
            'name' => trans('coupon_products::coupon_products.actions.create'),
            'url' => route('dashboard.coupon_products.create'),
            'can' => ['ability' => 'create', 'model' =>  \Modules\CouponProducts\Entities\CouponProduct::class],
            'isActive' => request()->routeIs('*coupon_products.create'),
        ]
    ])
@endcomponent
