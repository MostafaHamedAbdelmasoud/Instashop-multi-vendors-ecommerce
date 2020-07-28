@can('view', $customField)
    <a href="{{ route('dashboard.custom_fields.show', $customField) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
