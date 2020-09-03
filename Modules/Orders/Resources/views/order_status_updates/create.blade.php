@extends('dashboard::layouts.master', ['title' => trans('orders::order_status_updates.actions.create')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('orders::order_status_updates.plural'))
        @slot('breadcrumbs', ['dashboard.order_status_updates.create'])

        {{ BsForm::resource('orders::orders')->post(route('dashboard.order_status_updates.store') , ['files' => true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('orders::order_status_updates.actions.create'))

            @include('orders::order_status_updates.partials.form_create')

            @slot('footer')
                {{ BsForm::submit()->label(trans('orders::order_status_updates.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
