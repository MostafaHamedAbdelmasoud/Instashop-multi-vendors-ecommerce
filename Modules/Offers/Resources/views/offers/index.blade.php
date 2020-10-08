@extends('dashboard::layouts.master', ['title' => trans('offers::offers.plural')])

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('offers::offers.plural'))
        @slot('breadcrumbs', ['dashboard.offers.index'])

        @component('dashboard::layouts.components.table-box')
            @slot('title', trans('offers::offers.actions.list'))
            @slot('tools')
                @include('offers::offers.partials.actions.filter')
            @endslot

            <thead>
            <tr>
                <th>@lang('offers::offers.attributes.name')</th>
                <th>@lang('offers::offers.attributes.fixed_discount_price')</th>
                <th class="d-none d-md-table-cell">@lang('offers::offers.attributes.percentage_discount_price')</th>
                <th class="d-none d-md-table-cell">@lang('offers::offers.attributes.model_type')</th>
                <th class="d-none d-md-table-cell">@lang('offers::offers.attributes.model_id')</th>
                <th class="d-none d-md-table-cell">@lang('offers::offers.attributes.expire_at')</th>
                <th style="width: 160px">...</th>
            </tr>
            </thead>
            <tbody>
            @forelse($offers as $offer)
                <tr>
                    <td>
                        {{ $offer->name }}
                    </td>

                    <td>
                        {{ $offer->getFixedDiscountPrice() }}
                    </td>
                    <td class="d-none d-md-table-cell">
                        {{$offer->getPercentageDiscountPrice()}}
                    </td>

                    <td class="d-none d-md-table-cell">
                        {{$offer->getModelType()}}
                    </td>

                    <td class="d-none d-md-table-cell">
                        {{$offer->getModelName()}}
                    </td>

                    <td class="d-none d-md-table-cell">
                        {{$offer->expire_at}}
                    </td>


                    <td style="width: 160px">
                        @include('offers::offers.partials.actions.show')
                        @include('offers::offers.partials.actions.edit')
                        @include('offers::offers.partials.actions.delete')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="text-center">@lang('offers::offers.empty')</td>
                </tr>
            @endforelse

            @if($offers->hasPages())
                @slot('footer')
                    {{ $offers->links() }}
                @endslot
            @endif
        @endcomponent

    @endcomponent
@endsection
