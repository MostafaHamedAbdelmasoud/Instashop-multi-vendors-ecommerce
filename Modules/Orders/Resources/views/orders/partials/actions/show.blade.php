@can('view', $order)
    <a href="{{ route('dashboard.orders.show', $order) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
