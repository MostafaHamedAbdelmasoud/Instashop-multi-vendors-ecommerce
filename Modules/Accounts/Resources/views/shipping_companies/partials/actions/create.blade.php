@can('create', \Modules\Accounts\Entities\ShippingCompany::class)
    <a href="{{ route('dashboard.shipping_companies.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('accounts::shipping_companies.actions.create')
    </a>
@endcan
