@can('create', \Modules\Offers\Entities\Offer::class)
    <a href="{{ route('dashboard.Offers.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('Offers::Offers.actions.create')
    </a>
@endcan
