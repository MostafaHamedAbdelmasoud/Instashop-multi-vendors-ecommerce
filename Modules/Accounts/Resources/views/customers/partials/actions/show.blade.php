@can('view', $customer)
    <a href="{{ route('dashboard.customers.show', $customer) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
