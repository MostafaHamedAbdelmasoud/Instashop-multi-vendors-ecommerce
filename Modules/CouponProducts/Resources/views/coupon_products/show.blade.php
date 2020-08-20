@extends('dashboard::layouts.master', ['title' => $couponProduct->code])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $couponProduct->code)
        @slot('breadcrumbs', ['dashboard.coupon_products.show', $couponProduct])

        <div class="row">
            <div class="col-md-12">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-striped table-middle">
                        <tbody>
                        <tr>
                            <th width="200">@lang('coupon_products::coupon_products.attributes.coupon_id')</th>
                            <td>{{ $couponProduct->coupon->code }}</td>
                        </tr>

                        <tr>
                            <th width="200">@lang('coupon_products::coupon_products.attributes.model_type')</th>
                            <td>
                                {{trans('coupon_products::coupon_products.additions.'.$couponProduct->model_type)}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('coupon_products::coupon_products.attributes.model_id')</th>
                            <td>
                                @if($couponProduct->model_type == 'product')

                                    {{$couponProduct->product->name}}
                                @else

                                    {{$couponProduct->category->name}}
                                @endif

                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('coupon_products::coupon_products.attributes.type')</th>
                            <td>
                                {{trans('coupon_products::coupon_products.additions.'.$couponProduct->type)}}
                            </td>
                        </tr>


                        </tbody>
                    </table>

                    @slot('footer')
                        @include('coupon_products::coupon_products.partials.actions.edit')
                        @include('coupon_products::coupon_products.partials.actions.delete')
                    @endslot
                @endcomponent
            </div>
        </div>





    @endcomponent
@endsection
