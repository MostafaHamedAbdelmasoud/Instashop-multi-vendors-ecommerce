@extends('dashboard::layouts.master', ['title' => trans('coupons::coupons.plural')])

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('coupons::coupons.plural'))
        @slot('breadcrumbs', ['dashboard.coupons.index'])

        @component('dashboard::layouts.components.table-box')
            @slot('title', trans('coupons::coupons.actions.list'))
            @slot('tools')
                @include('coupons::coupons.partials.actions.filter')
                @include('coupons::coupons.partials.actions.create')
            @endslot

            <thead>
            <tr>
                <th>@lang('coupons::coupons.attributes.code')</th>
                <th>@lang('coupons::coupons.attributes.fixed_discount')</th>
                <th class="d-none d-md-table-cell">@lang('coupons::coupons.attributes.percentage_discount')</th>
                <th class="d-none d-md-table-cell">@lang('coupons::coupons.attributes.max_usage_per_order')</th>
                <th class="d-none d-md-table-cell">@lang('coupons::coupons.attributes.max_usage_per_user')</th>
                <th class="d-none d-md-table-cell">@lang('coupons::coupons.attributes.min_total')</th>
                <th style="width: 160px">...</th>
            </tr>
            </thead>
            <tbody>
            @forelse($coupons as $coupon)
                <tr>
                    <td>
                        {{ $coupon->code }}
                    </td>

                    <td>
                        {{ $coupon->get_fixed_discount() }}
                    </td>
                    <td class="d-none d-md-table-cell">
                        {{$coupon->get_percentage_discount()}}
                    </td>

                    <td class="d-none d-md-table-cell">
                        {{$coupon->max_usage_per_order}}
                    </td>

                    <td class="d-none d-md-table-cell">
                        {{$coupon->max_usage_per_user}}
                    </td>

                    <td class="d-none d-md-table-cell">
                        {{$coupon->get_min_total()}}
                    </td>


                    <td style="width: 160px">
                        @include('coupons::coupons.partials.actions.show')
                        @include('coupons::coupons.partials.actions.edit')
                        @include('coupons::coupons.partials.actions.delete')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="text-center">@lang('coupons::coupons.empty')</td>
                </tr>
            @endforelse

            @if($coupons->hasPages())
                @slot('footer')
                    {{ $coupons->links() }}
                @endslot
            @endif
        @endcomponent

    @endcomponent
@endsection
