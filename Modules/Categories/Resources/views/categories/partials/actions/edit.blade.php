@can('update', $category)
    <a href="{{ route('dashboard.categories.edit', $category) }}" class="btn btn-outline-primary btn-sm">
        <i class="fas fa fa-fw fa-user-edit"></i>
    </a>
@endcan
