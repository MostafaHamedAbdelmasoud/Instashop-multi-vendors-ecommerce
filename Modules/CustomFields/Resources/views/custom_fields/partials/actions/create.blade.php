@can('create', \Modules\CustomFields\Entities\CustomField::class)
    <a href="{{ route('dashboard.custom_fields.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('custom_fields::custom_fields.actions.create')
    </a>
@endcan
