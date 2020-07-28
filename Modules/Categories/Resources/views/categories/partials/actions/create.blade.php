@can('create', \Modules\Categories\Entities\Categories::class)
    <a href="{{ route('dashboard.categories.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('categories::categories.actions.create')
    </a>
@endcan
