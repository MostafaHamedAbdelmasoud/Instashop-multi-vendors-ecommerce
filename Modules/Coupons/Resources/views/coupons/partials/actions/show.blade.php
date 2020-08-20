@can('view', $coupon)
    <a href="{{ route('dashboard.coupons.show', $coupon) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
