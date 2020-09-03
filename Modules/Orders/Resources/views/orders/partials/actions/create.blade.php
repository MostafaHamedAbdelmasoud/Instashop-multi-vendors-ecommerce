@can('create', \Modules\Orders\Entities\Order::class)
    <a href="{{ route('dashboard.orders.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('orders::orders.actions.create')
    </a>
@endcan
