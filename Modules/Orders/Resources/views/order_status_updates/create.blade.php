@extends('dashboard::layouts.master', ['title' => trans('order_status_updates::order_status_updates.actions.create')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('order_status_updates::order_status_updates.plural'))
        @slot('breadcrumbs', ['dashboard.order_status_updates.create'])

        {{ BsForm::resource('order_status_updates::order_status_updates')->post(route('dashboard.orders.order_status_updates.store') , ['files' => true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('order_status_updates::order_status_updates.actions.create'))

            @include('order_status_updates::order_status_updates.partials.form_create')

            @slot('footer')
                {{ BsForm::submit()->label(trans('order_status_updates::order_status_updates.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
