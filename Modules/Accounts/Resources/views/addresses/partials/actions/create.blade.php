@can('create', \Modules\Accounts\Entities\Address::class)
    <a href="{{ route('dashboard.addresses.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('accounts::addresses.actions.create')
    </a>
@endcan
