@extends('dashboard::layouts.master', ['title' => $coupon->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $coupon->name)
        @slot('breadcrumbs', ['dashboard.coupons.edit', $coupon])

        {{ BsForm::resource('coupons::coupons')->putModel($coupon, route('dashboard.coupons.update', $coupon) , ['files'=>true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('coupons::coupons.actions.edit'))

            @include('coupons::coupons.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('coupons::coupons.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
