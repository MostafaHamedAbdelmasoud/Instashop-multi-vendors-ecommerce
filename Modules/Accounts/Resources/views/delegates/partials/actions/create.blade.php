@can('create', \Modules\Accounts\Entities\Delegate::class)
    <a href="{{ route('dashboard.delegates.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('accounts::delegates.actions.create')
    </a>
@endcan
