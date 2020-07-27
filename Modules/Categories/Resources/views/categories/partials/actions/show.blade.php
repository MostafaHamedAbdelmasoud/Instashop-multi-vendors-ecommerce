@can('view', $category)
    <a href="{{ route('dashboard.categories.show', $category) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
