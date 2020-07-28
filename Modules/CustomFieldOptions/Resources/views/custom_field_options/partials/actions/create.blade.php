@can('create', \Modules\CustomFieldOptions\Entities\CustomFieldOption::class)
    <a href="{{ route('dashboard.custom_field_options.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('custom_field_options::custom_field_options.actions.create')
    </a>
@endcan
