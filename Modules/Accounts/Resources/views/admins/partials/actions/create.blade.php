@can('create', \Modules\Accounts\Entities\Admin::class)
    <a href="{{ route('dashboard.admins.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('accounts::admins.actions.create')
    </a>
@endcan
