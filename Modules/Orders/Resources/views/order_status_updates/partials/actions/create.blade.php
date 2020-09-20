@can('create', \Modules\Orders\Entities\OrderStatusUpdate::class)
    <a href="{{ route('dashboard.orders.order_status_updates.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('orders::order_status_updates.actions.create')
    </a>
@endcan
