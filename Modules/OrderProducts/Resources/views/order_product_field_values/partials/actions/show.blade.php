@can('view', $orderProduct)
    <a href="{{ route('dashboard.order_products.show', $orderProduct) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
