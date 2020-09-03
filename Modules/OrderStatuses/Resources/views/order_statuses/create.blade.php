@extends('dashboard::layouts.master', ['title' => trans('order_statuses::order_statuses.actions.create')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('order_statuses::order_statuses.plural'))
        @slot('breadcrumbs', ['dashboard.order_statuses.create'])

        {{ BsForm::resource('order_statuses::order_statuses')->post(route('dashboard.order_statuses.store')) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('order_statuses::order_statuses.actions.create'))

            @include('order_statuses::order_statuses.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('order_statuses::order_statuses.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
