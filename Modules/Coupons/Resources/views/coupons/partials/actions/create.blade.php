@can('create', \Modules\Coupons\Entities\Coupon::class)
    <a href="{{ route('dashboard.coupons.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('coupons::coupons.actions.create')
    </a>
@endcan
