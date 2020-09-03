@can('create', \Modules\OrderProducts\Entities\OrderProduct::class)
    <a href="{{ route('dashboard.order_products.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('order_products::order_products.actions.create')
    </a>
@endcan
