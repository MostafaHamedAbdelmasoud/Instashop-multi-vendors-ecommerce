@extends('dashboard::layouts.master', ['title' => $orderStatusUpdate->id])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $orderStatusUpdate->id)
        @slot('breadcrumbs', ['dashboard.order_status_updates.edit', $order,$orderStatusUpdate])

        {{ BsForm::resource('orders::orders')->putModel($orderStatusUpdate, route('dashboard.orders.order_status_updates.update', [$order,$orderStatusUpdate]) ) }}
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
