@can('create', \Modules\Countries\Entities\Country::class)
    <a href="{{ route('dashboard.countries.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('countries::countries.actions.create')
    </a>
@endcan
