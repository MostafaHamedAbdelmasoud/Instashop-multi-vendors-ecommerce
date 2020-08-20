@component('dashboard::layouts.components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \Modules\Coupons\Entities\Coupon::class])
    @slot('url', 'coupons')
    @slot('name', trans('coupons::coupons.plural'))
    @slot('isActive', request()->routeIs('coupons*'))
    @slot('icon', 'fas fa-barcode')
    @slot('tree', [
        [
            'name' => trans('coupons::coupons.actions.list'),
            'url' => route('dashboard.coupons.index'),
            'can' => ['ability' => 'viewAny', 'model' => \Modules\Coupons\Entities\Coupon::class],
            'isActive' => request()->routeIs('*coupons.index*'),
        ],
        [
            'name' => trans('coupons::coupons.actions.create'),
            'url' => route('dashboard.coupons.create'),
            'can' => ['ability' => 'create', 'model' =>  \Modules\Coupons\Entities\Coupon::class],
            'isActive' => request()->routeIs('*coupons.create'),
        ]
    ])
@endcomponent
