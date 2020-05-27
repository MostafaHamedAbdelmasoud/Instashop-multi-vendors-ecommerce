@can('create', \Modules\Accounts\Entities\Customer::class)
    <a href="{{ route('dashboard.customers.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('accounts::customers.actions.create')
    </a>
@endcan
