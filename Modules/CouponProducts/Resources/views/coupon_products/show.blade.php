@extends('dashboard::layouts.master', ['title' => $coupon->code])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $coupon->code)
        @slot('breadcrumbs', ['dashboard.coupons.show', $coupon])

        <div class="row">
            <div class="col-md-12">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-striped table-middle">
                        <tbody>
                        <tr>
                            <th width="200">@lang('coupons::coupons.attributes.code')</th>
                            <td>{{ $coupon->code }}</td>
                        </tr>

                        <tr>
                            <th width="200">@lang('coupons::coupons.attributes.fixed_discount')</th>
                            <td>
                                {{$coupon->get_fixed_discount()}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('coupons::coupons.attributes.percentage_discount')</th>
                            <td>
                                {{$coupon->get_percentage_discount()}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('coupons::coupons.attributes.max_usage_per_order')</th>
                            <td>
                                    {{$coupon->max_usage_per_order}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('coupons::coupons.attributes.max_usage_per_user')</th>
                            <td>
                                    {{$coupon->max_usage_per_user}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('coupons::coupons.attributes.min_total')</th>
                            <td>
                                    {{$coupon->get_min_total()}}
                            </td>
                        </tr>




                        </tbody>
                    </table>

                    @slot('footer')
                        @include('coupons::coupons.partials.actions.edit')
                        @include('coupons::coupons.partials.actions.delete')
                    @endslot
                @endcomponent
            </div>
        </div>





    @endcomponent
@endsection
