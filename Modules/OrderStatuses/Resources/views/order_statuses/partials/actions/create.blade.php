@can('create', \Modules\OrderStatuses\Entities\OrderStatus::class)
    <a href="{{ route('dashboard.order_statuses.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('order_statuses::order_statuses.actions.create')
    </a>
@endcan
