@extends('dashboard::layouts.master', ['title' => trans('offers::offers.plural')])

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('offers::offers.plural'))
        @slot('breadcrumbs', ['dashboard.Offers.index'])

        @component('dashboard::layouts.components.table-box')
            @slot('title', trans('offers::offers.actions.list'))
            @slot('tools')
                @include('Offers::Offers.partials.actions.filter')
                @include('Offers::Offers.partials.actions.create')
            @endslot

            <thead>
            <tr>
                <th>@lang('Offers::Offers.attributes.code')</th>
                <th>@lang('Offers::Offers.attributes.fixed_discount')</th>
                <th class="d-none d-md-table-cell">@lang('Offers::Offers.attributes.percentage_discount')</th>
                <th class="d-none d-md-table-cell">@lang('Offers::Offers.attributes.max_usage_per_order')</th>
                <th class="d-none d-md-table-cell">@lang('Offers::Offers.attributes.max_usage_per_user')</th>
                <th class="d-none d-md-table-cell">@lang('Offers::Offers.attributes.min_total')</th>
                <th style="width: 160px">...</th>
            </tr>
            </thead>
            <tbody>
            @forelse($Offers as $offer)
                <tr>
                    <td>
                        {{ $offer->code }}
                    </td>

                    <td>
                        {{ $offer->get_fixed_discount() }}
                    </td>
                    <td class="d-none d-md-table-cell">
                        {{$offer->get_percentage_discount()}}
                    </td>

                    <td class="d-none d-md-table-cell">
                        {{$offer->max_usage_per_order}}
                    </td>

                    <td class="d-none d-md-table-cell">
                        {{$offer->max_usage_per_user}}
                    </td>

                    <td class="d-none d-md-table-cell">
                        {{$offer->get_min_total()}}
                    </td>


                    <td style="width: 160px">
                        @include('Offers::Offers.partials.actions.show')
                        @include('Offers::Offers.partials.actions.edit')
                        @include('Offers::Offers.partials.actions.delete')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="text-center">@lang('Offers::Offers.empty')</td>
                </tr>
            @endforelse

            @if($Offers->hasPages())
                @slot('footer')
                    {{ $Offers->links() }}
                @endslot
            @endif
        @endcomponent

    @endcomponent
@endsection
