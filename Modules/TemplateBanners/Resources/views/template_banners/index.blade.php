@extends('dashboard::layouts.master', ['title' => trans('template_banners::template_banners.plural')])

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('template_banners::template_banners.plural'))
        @slot('breadcrumbs', ['dashboard.template_banners.index'])

        @component('dashboard::layouts.components.table-box')
            @slot('title', trans('template_banners::template_banners.actions.list'))
            @slot('tools')
                @include('template_banners::template_banners.partials.actions.filter')
                @include('template_banners::template_banners.partials.actions.create')
            @endslot

            <thead>
            <tr>
                <th>@lang('template_banners::template_banners.attributes.code')</th>
                <th>@lang('template_banners::template_banners.attributes.fixed_discount')</th>
                <th class="d-none d-md-table-cell">@lang('template_banners::template_banners.attributes.percentage_discount')</th>
                <th class="d-none d-md-table-cell">@lang('template_banners::template_banners.attributes.max_usage_per_order')</th>
                <th class="d-none d-md-table-cell">@lang('template_banners::template_banners.attributes.max_usage_per_user')</th>
                <th class="d-none d-md-table-cell">@lang('template_banners::template_banners.attributes.min_total')</th>
                <th style="width: 160px">...</th>
            </tr>
            </thead>
            <tbody>
            @forelse($template_banners as $templateBanner)
                <tr>
                    <td>
                        {{ $templateBanner->code }}
                    </td>

                    <td>
                        {{ $templateBanner->get_fixed_discount() }}
                    </td>
                    <td class="d-none d-md-table-cell">
                        {{$templateBanner->get_percentage_discount()}}
                    </td>

                    <td class="d-none d-md-table-cell">
                        {{$templateBanner->max_usage_per_order}}
                    </td>

                    <td class="d-none d-md-table-cell">
                        {{$templateBanner->max_usage_per_user}}
                    </td>

                    <td class="d-none d-md-table-cell">
                        {{$templateBanner->get_min_total()}}
                    </td>


                    <td style="width: 160px">
                        @include('template_banners::template_banners.partials.actions.show')
                        @include('template_banners::template_banners.partials.actions.edit')
                        @include('template_banners::template_banners.partials.actions.delete')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="text-center">@lang('template_banners::template_banners.empty')</td>
                </tr>
            @endforelse

            @if($template_banners->hasPages())
                @slot('footer')
                    {{ $template_banners->links() }}
                @endslot
            @endif
        @endcomponent

    @endcomponent
@endsection
