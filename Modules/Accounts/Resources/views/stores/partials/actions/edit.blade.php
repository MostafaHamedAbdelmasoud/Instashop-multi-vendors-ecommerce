@can('update',$store)
    <a href="{{ route('dashboard.store_owners.stores.edit', [$storeOwner,$store]) }}" class="btn btn-outline-primary btn-sm">
        <i class="fas fa fa-fw fa-user-edit"></i>
    </a>
@endcan
