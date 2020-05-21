@can('create', \Modules\Accounts\Entities\ShippingCompanyOwner::class)
    <a href="{{ route('dashboard.shipping_company_owners.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('accounts::shipping_company_owners.actions.create')
    </a>
@endcan
