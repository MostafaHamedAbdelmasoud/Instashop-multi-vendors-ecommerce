@can('view', $orderStatus)
    <a href="{{ route('dashboard.order_statuses.show', $orderStatus) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
