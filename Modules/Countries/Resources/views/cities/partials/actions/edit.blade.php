@can('update', $city)
    <a href="{{ route('dashboard.countries.cities.edit', [$country, $city]) }}" class="btn btn-outline-primary btn-sm">
        <i class="fas fa fa-fw fa-user-edit"></i>
    </a>
@endcan
