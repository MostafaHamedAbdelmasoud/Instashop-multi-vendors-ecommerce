@can('create', \Modules\Products\Entities\Product::class)
    <a href="{{ route('dashboard.products.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('products::products.actions.create')
    </a>
@endcan
