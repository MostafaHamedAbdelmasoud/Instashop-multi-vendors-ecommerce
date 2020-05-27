@can('create', \Modules\Countries\Entities\City::class)
    <a href="{{ route('dashboard.cities.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('countries::cities.actions.create')
    </a>
@endcan
