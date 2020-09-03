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
                <th>@lang('orders::orders.attributes.id')</th>
                <th>@lang('orders::orders.attributes.user_id')</th>
                <th class="d-none d-md-table-cell">@lang('orders::orders.attributes.address_id')</th>
                <th class="d-none d-md-table-cell">@lang('orders::orders.attributes.shipping_company_id')</th>
                <th class="d-none d-md-table-cell">@lang('orders::orders.attributes.coupon_id')</th>
                <th class="d-none d-md-table-cell">@lang('orders::orders.attributes.shipping_company_notes')</th>
                <th class="d-none d-md-table-cell">@lang('orders::orders.attributes.discount')</th>
                <th class="d-none d-md-table-cell">@lang('orders::orders.attributes.total')</th>
                <th style="width: 160px">...</th>
            </tr>
            </thead>
            <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>
                        {{ $order->id }}
                    </td>

                    <td>
                        <a href="{{ route('dashboard.customers.show', $order->user) }}"
                           class="text-decoration-none text-ellipsis">
                            {{ $order->getUserName() }}
                        </a>
                    </td>

                    <td class="d-none d-md-table-cell">
                        {!! Str::limit($order->getAddress(), 10, ' ...') !!}

                    </td>

                    <td class="d-none d-md-table-cell">
                        <a href="{{ route('dashboard.shipping_company_owners.show',[$order->shipping_company->ShippingCompanyOwner ]) }}"
                           class="text-decoration-none text-ellipsis">
                            {!! Str::limit($order->getShippingCompanyName(), 25, ' ...') !!}
                        </a>
                    </td>

                    <td class="d-none d-md-table-cell">
                        <a href="{{ route('dashboard.coupons.show', $order->coupon) }}"
                           class="text-decoration-none text-ellipsis">
                            {{$order->getCouponCode()}}
                        </a>
                    </td>

                    <td class="d-none d-md-table-cell">
                        {!! Str::limit($order->shipping_company_notes, 10, ' ...') !!}
                    </td>


                    <td class="d-none d-md-table-cell">
                        {{$order->getDiscountValue()}}
                    </td>

                    <td class="d-none d-md-table-cell">
                        {{$order->total}}
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
