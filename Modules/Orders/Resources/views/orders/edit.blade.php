@extends('dashboard::layouts.master', ['title' => $order->id])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $order->id)
        @slot('breadcrumbs', ['dashboard.orders.edit', $order])

        {{ BsForm::resource('orders::orders')->putModel($order, route('dashboard.orders.update', $order) , ['files'=>true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('orders::orders.actions.edit'))

            @include('orders::orders.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('orders::orders.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
