@can('view', $country)
    <a href="{{ route('dashboard.countries.show', $country) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
