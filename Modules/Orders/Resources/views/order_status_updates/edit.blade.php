@extends('dashboard::layouts.master', ['title' => $order->id])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $order->id)
        @slot('breadcrumbs', ['dashboard.order_status_updates.edit', $order])

        {{ BsForm::resource('orders::orders')->putModel($order, route('dashboard.order_status_updates.update', $order) , ['files'=>true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('orders::order_status_updates.actions.edit'))

            @include('orders::order_status_updates.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('orders::order_status_updates.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
