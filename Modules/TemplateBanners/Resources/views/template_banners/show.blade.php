@extends('dashboard::layouts.master', ['title' => $templateBanner->code])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $templateBanner->code)
        @slot('breadcrumbs', ['dashboard.template_banners.show', $templateBanner])

        <div class="row">
            <div class="col-md-12">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-striped table-middle">
                        <tbody>
                        <tr>
                            <th width="200">@lang('template_banners::template_banners.attributes.code')</th>
                            <td>{{ $templateBanner->code }}</td>
                        </tr>

                        <tr>
                            <th width="200">@lang('template_banners::template_banners.attributes.fixed_discount')</th>
                            <td>
                                {{$templateBanner->get_fixed_discount()}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('template_banners::template_banners.attributes.percentage_discount')</th>
                            <td>
                                {{$templateBanner->get_percentage_discount()}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('template_banners::template_banners.attributes.max_usage_per_order')</th>
                            <td>
                                    {{$templateBanner->max_usage_per_order}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('template_banners::template_banners.attributes.max_usage_per_user')</th>
                            <td>
                                    {{$templateBanner->max_usage_per_user}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('template_banners::template_banners.attributes.min_total')</th>
                            <td>
                                    {{$templateBanner->get_min_total()}}
                            </td>
                        </tr>




                        </tbody>
                    </table>

                    @slot('footer')
                        @include('template_banners::template_banners.partials.actions.edit')
                        @include('template_banners::template_banners.partials.actions.delete')
                    @endslot
                @endcomponent
            </div>
        </div>





    @endcomponent
@endsection
