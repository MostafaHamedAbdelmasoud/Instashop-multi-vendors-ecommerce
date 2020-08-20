@can('create', \Modules\CouponProducts\Entities\CouponProduct::class)
    <a href="{{ route('dashboard.coupon_products.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('coupon_products::coupon_products.actions.create')
    </a>
@endcan
