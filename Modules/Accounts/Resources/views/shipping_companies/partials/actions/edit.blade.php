@can('update', $shippingCompany)
    <a href="{{ route('dashboard.shipping_company_owners.shipping_companies.edit', [$shippingCompanyOwner, $shippingCompany]) }}" class="btn btn-outline-primary btn-sm">
        <i class="fas fa fa-fw fa-user-edit"></i>
    </a>
@endcan
