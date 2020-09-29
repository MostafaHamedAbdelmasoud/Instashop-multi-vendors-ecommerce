@can('create', \Modules\Offers\Entities\Offer::class)
    <a href="{{ route('dashboard.offers.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('offers::offers.actions.create')
    </a>
@endcan
