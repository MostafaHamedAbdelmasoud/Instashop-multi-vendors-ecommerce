@can('create', \Modules\Accounts\Entities\Store::class)
    <a href="{{ route('dashboard.stores.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('accounts::stores.actions.create')
    </a>
@endcan
