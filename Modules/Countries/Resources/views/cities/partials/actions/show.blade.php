@can('view', $city)
    <a href="{{ route('dashboard.cities.show', $city) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
