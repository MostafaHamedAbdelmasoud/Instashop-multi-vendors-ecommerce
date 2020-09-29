@can('view', $offer)
    <a href="{{ route('dashboard.offers.show', $offer) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
