@extends('dashboard::layouts.master', ['title' => $orderStatus->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $orderStatus->name)
        @slot('breadcrumbs', ['dashboard.order_statuses.edit', $orderStatus])

        {{ BsForm::resource('order_statuses::order_statuses')->putModel($orderStatus, route('dashboard.order_statuses.update', $orderStatus) , ['files'=>true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('order_statuses::order_statuses.actions.edit'))

            @include('order_statuses::order_statuses.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('order_statuses::order_statuses.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
