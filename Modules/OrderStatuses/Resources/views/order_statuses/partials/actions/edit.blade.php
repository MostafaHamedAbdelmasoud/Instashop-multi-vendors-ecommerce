@can('update', $orderStatus)
    <a href="{{ route('dashboard.order_statuses.edit', $orderStatus) }}" class="btn btn-outline-primary btn-sm">
        <i class="fas fa fa-fw fa-user-edit"></i>
    </a>
@endcan
