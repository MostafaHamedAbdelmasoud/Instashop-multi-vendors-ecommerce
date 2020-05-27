@can('view', $shippingCompany)
    <a href="{{ route('dashboard.shipping_companies.show', $shippingCompany) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
