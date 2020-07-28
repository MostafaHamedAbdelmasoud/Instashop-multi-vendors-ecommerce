@can('create', \Modules\CustomFields\Entities\CustomField::class)
    <a href="{{ route('dashboard.products.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('products::products.actions.create')
    </a>
@endcan
