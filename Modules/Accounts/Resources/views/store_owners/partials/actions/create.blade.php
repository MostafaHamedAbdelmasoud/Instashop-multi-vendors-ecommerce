@can('create', \Modules\Accounts\Entities\StoreOwner::class)
    <a href="{{ route('dashboard.store_owners.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('accounts::store_owners.actions.create')
    </a>
@endcan
