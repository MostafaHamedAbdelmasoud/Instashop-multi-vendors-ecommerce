@extends('dashboard::layouts.master', ['title' => trans('coupon_products::coupon_products.plural')])

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('coupon_products::coupon_products.plural'))
        @slot('breadcrumbs', ['dashboard.coupon_products.index'])

        @component('dashboard::layouts.components.table-box')
            @slot('title', trans('coupon_products::coupon_products.actions.list'))
            @slot('tools')
                @include('coupon_products::coupon_products.partials.actions.filter')
                @include('coupon_products::coupon_products.partials.actions.create')
            @endslot

            <thead>
            <tr>
                <th>@lang('coupon_products::coupon_products.attributes.model_id')</th>
                <th class="d-none d-md-table-cell">@lang('coupon_products::coupon_products.attributes.coupon_id')</th>
                <th>@lang('coupon_products::coupon_products.attributes.model_type')</th>
                <th class="d-none d-md-table-cell">@lang('coupon_products::coupon_products.attributes.type')</th>
                <th style="width: 160px">...</th>
            </tr>
            </thead>
            <tbody>
            @forelse($couponProducts as $couponProduct)
                <tr>
                    <td>
                        {{ $couponProduct->getModelName() }}
                    </td>

                    <td class="d-none d-md-table-cell">
                        {{$couponProduct->getCouponCode()}}
                    </td>
                    <td>
                        {{ $couponProduct->model_type }}
                    </td>


                    <td class="d-none d-md-table-cell">
                        {{$couponProduct->type}}
                    </td>


                    <td style="width: 160px">
                        @include('coupon_products::coupon_products.partials.actions.show')
                        @include('coupon_products::coupon_products.partials.actions.edit')
                        @include('coupon_products::coupon_products.partials.actions.delete')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="text-center">@lang('coupon_products::coupon_products.empty')</td>
                </tr>
            @endforelse

            @if($couponProducts->hasPages())
                @slot('footer')
                    {{ $couponProducts->links() }}
                @endslot
            @endif
        @endcomponent

    @endcomponent
@endsection
