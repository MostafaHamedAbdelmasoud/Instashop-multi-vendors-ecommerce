@can('view', $couponProduct)
    <a href="{{ route('dashboard.coupon_products.show', $couponProduct) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
