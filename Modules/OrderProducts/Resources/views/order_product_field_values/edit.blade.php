@extends('dashboard::layouts.master', ['title' => $orderProductFieldValue->value])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $orderProductFieldValue->value)
        @slot('breadcrumbs', ['dashboard.order_products.order_product_field_values.edit', $orderProduct,$orderProductFieldValue])

        {{ BsForm::resource('order_products::order_product_field_values')->putModel($orderProductFieldValue, route('dashboard.order_products.order_product_field_values.update', [$orderProduct,$orderProductFieldValue]) ) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('order_products::order_product_field_values.actions.edit'))

            @include('order_products::order_product_field_values.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('order_products::order_product_field_values.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
