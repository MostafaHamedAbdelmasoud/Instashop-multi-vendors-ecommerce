@extends('dashboard::layouts.master', ['title' => $couponProduct->coupon->code])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $couponProduct->coupon->code)
        @slot('breadcrumbs', ['dashboard.edit_coupon_category', $couponProduct])

        {{ BsForm::resource('coupon_products::coupon_products')->putModel($couponProduct, route('dashboard.coupon_products.update', $couponProduct) , ['files'=>true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('coupon_products::coupon_products.actions.edit'))

            @include('coupon_products::coupon_products.partials.form_category')

            @slot('footer')
                {{ BsForm::submit()->label(trans('coupon_products::coupon_products.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
