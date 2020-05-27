@can('update', $address)
    <a href="{{ route('dashboard.customers.addresses.edit', [$customer, $address]) }}" class="btn btn-outline-primary btn-sm">
        <i class="fas fa fa-fw fa-user-edit"></i>
    </a>
@endcan
