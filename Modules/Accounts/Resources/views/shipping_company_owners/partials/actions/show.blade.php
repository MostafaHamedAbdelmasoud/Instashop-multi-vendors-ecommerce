@can('view', $shippingCompanyOwner)
    <a href="{{ route('dashboard.shipping_company_owners.show', $shippingCompanyOwner) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
