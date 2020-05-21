@can('view', $address)
    <a href="{{ route('dashboard.addresses.show', $address) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
