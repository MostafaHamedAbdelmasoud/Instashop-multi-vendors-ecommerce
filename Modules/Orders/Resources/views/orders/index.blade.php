@extends('dashboard::layouts.master', ['title' => trans('orders::orders.plural')])

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('orders::orders.plural'))
        @slot('breadcrumbs', ['dashboard.orders.index'])

        @component('dashboard::layouts.components.table-box')
            @slot('title', trans('orders::orders.actions.list'))
            @slot('tools')
                @include('orders::orders.partials.actions.filter')
                @include('orders::orders.partials.actions.create')
            @endslot

            <thead>
            <tr>
                <th>@lang('orders::orders.attributes.name')</th>
                <th>@lang('orders::orders.attributes.code')</th>
                <th class="d-none d-md-table-cell">@lang('orders::orders.attributes.category_id')</th>
                <th class="d-none d-md-table-cell">@lang('orders::orders.attributes.store_id')</th>
                <th class="d-none d-md-table-cell">@lang('orders::orders.attributes.price')</th>
                <th class="d-none d-md-table-cell">@lang('orders::orders.attributes.meta_description')</th>
                <th style="width: 160px">...</th>
            </tr>
            </thead>
            <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>
                        <a href="{{ route('dashboard.orders.show', $order) }}"
                           class="text-decoration-none text-ellipsis">
                            {{ $order->name }}
                        </a>
                    </td>

                    <td>
                        {{ $order->code }}
                    </td>
                    <td class="d-none d-md-table-cell">
                        <a href="{{ route('dashboard.categories.show', $order->category) }}"
                           class="text-decoration-none text-ellipsis">
                            {{$order->category->name}}
                        </a>
                    </td>

                    <td class="d-none d-md-table-cell">
                        <a href="{{ route('dashboard.stores.show', $order->store) }}"
                           class="text-decoration-none text-ellipsis">
                            {{$order->store->name}}
                        </a>
                    </td>

                    <td class="d-none d-md-table-cell">
                        {{$order->price}}
                    </td>

                    <td class="d-none d-md-table-cell">
                        {!! Str::limit($order->meta_description, 25, ' ...') !!}
                    </td>

                    <td style="width: 160px">
                        @include('orders::orders.partials.actions.show')
                        @include('orders::orders.partials.actions.edit')
                        @include('orders::orders.partials.actions.delete')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="text-center">@lang('orders::orders.empty')</td>
                </tr>
            @endforelse

            @if($orders->hasPages())
                @slot('footer')
                    {{ $orders->links() }}
                @endslot
            @endif
        @endcomponent

    @endcomponent
@endsection
