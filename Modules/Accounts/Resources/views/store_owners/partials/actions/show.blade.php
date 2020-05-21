@can('view', $storeOwner)
    <a href="{{ route('dashboard.store_owners.show', $storeOwner) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
