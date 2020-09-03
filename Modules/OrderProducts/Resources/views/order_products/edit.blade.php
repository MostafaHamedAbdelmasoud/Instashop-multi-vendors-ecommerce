@extends('dashboard::layouts.master', ['title' => $orderProduct->order_id])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $orderProduct->order_id)
        @slot('breadcrumbs', ['dashboard.order_products.edit', $orderProduct])

        {{ BsForm::resource('order_products::order_products')->putModel($orderProduct, route('dashboard.order_products.update', $orderProduct) , ['files'=>true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('order_products::order_products.actions.edit'))

            @include('order_products::order_products.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('order_products::order_products.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
