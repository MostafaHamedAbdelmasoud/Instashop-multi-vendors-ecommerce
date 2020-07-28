@extends('dashboard::layouts.master', ['title' => trans('products::products.plural')])

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('products::products.plural'))
        @slot('breadcrumbs', ['dashboard.products.index'])

        @component('dashboard::layouts.components.table-box')
            @slot('title', trans('products::products.actions.list'))
            @slot('tools')
                @include('products::products.partials.actions.filter')
                @include('products::products.partials.actions.create')
            @endslot

            <thead>
            <tr>
                <th>@lang('products::products.attributes.name')</th>
                <th>@lang('products::products.attributes.code')</th>
                <th class="d-none d-md-table-cell">@lang('products::products.attributes.category_id')</th>
                <th class="d-none d-md-table-cell">@lang('products::products.attributes.store_id')</th>
                <th class="d-none d-md-table-cell">@lang('products::products.attributes.price')</th>
                <th class="d-none d-md-table-cell">@lang('products::products.attributes.meta_description')</th>
                <th style="width: 160px">...</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr>
                    <td>
                        <a href="{{ route('dashboard.products.show', $product) }}"
                           class="text-decoration-none text-ellipsis">
                            {{ $product->name }}
                        </a>
                    </td>

                    <td>
                        {{ $product->code }}
                    </td>
                    <td class="d-none d-md-table-cell">
                        <a href="{{ route('dashboard.categories.show', $product->category) }}"
                           class="text-decoration-none text-ellipsis">
                            {{$product->category->name}}
                        </a>
                    </td>

                    <td class="d-none d-md-table-cell">
                        <a href="{{ route('dashboard.stores.show', $product->store) }}"
                           class="text-decoration-none text-ellipsis">
                            {{$product->store->name}}
                        </a>
                    </td>

                    <td class="d-none d-md-table-cell">
                        {{$product->price}}
                    </td>

                    <td class="d-none d-md-table-cell">
                        {!! Str::limit($product->meta_description, 25, ' ...') !!}
                    </td>

                    <td style="width: 160px">
                        @include('products::products.partials.actions.show')
                        @include('products::products.partials.actions.edit')
                        @include('products::products.partials.actions.delete')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="text-center">@lang('products::products.empty')</td>
                </tr>
            @endforelse

            @if($products->hasPages())
                @slot('footer')
                    {{ $products->links() }}
                @endslot
            @endif
        @endcomponent

    @endcomponent
@endsection
