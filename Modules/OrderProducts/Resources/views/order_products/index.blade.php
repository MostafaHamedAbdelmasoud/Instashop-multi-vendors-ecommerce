@extends('dashboard::layouts.master', ['title' => trans('order_products::order_products.plural')])

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('order_products::order_products.plural'))
        @slot('breadcrumbs', ['dashboard.order_products.index'])

        @component('dashboard::layouts.components.table-box')
            @slot('title', trans('order_products::order_products.actions.list'))
            @slot('tools')
                @include('order_products::order_products.partials.actions.filter')
                @include('order_products::order_products.partials.actions.create')
            @endslot

            <thead>
            <tr>
                <th>@lang('order_products::order_products.attributes.product_id')</th>
                <th>@lang('order_products::order_products.attributes.order_id')</th>
                <th class="d-none d-md-table-cell">@lang('order_products::order_products.attributes.price')</th>
                <th class="d-none d-md-table-cell">@lang('order_products::order_products.attributes.quantity')</th>
                <th class="d-none d-md-table-cell">@lang('order_products::order_products.attributes.total')</th>
                <th style="width: 160px">...</th>
            </tr>
            </thead>
            <tbody>
            @forelse($orderProducts as $orderProduct)
                <tr>
                    <td>
                        <a href="{{ route('dashboard.products.show', $orderProduct->product) }}"
                           class="text-decoration-none text-ellipsis">
                            {{ $orderProduct->getProductName() }}
                        </a>
                    </td>

                    <td>
                        <a href="{{ route('dashboard.orders.show', $orderProduct->order) }}"
                           class="text-decoration-none text-ellipsis">
                            {{ $orderProduct->getOrderId() }}
                        </a>
                    </td>

                    <td class="d-none d-md-table-cell">
                            {{$orderProduct->getProductPrice()}}
                    </td>

                    <td class="d-none d-md-table-cell">
                            {{$orderProduct->quantity}}
                    </td>

                    <td class="d-none d-md-table-cell">
                        {{$orderProduct->getProductTotal()}}
                    </td>


                    <td style="width: 160px">
                        @include('order_products::order_products.partials.actions.show')
                        @include('order_products::order_products.partials.actions.edit')
                        @include('order_products::order_products.partials.actions.delete')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="text-center">@lang('order_products::order_products.empty')</td>
                </tr>
            @endforelse

            @if($orderProducts->hasPages())
                @slot('footer')
                    {{ $orderProducts->links() }}
                @endslot
            @endif
        @endcomponent

    @endcomponent
@endsection
