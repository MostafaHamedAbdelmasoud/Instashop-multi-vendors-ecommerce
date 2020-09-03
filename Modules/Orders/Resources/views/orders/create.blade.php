@extends('dashboard::layouts.master', ['title' => trans('orders::orders.actions.create')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('orders::orders.plural'))
        @slot('breadcrumbs', ['dashboard.orders.create'])

        {{ BsForm::resource('orders::orders')->post(route('dashboard.orders.store') , ['files' => true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('orders::orders.actions.create'))

            @include('orders::orders.partials.form_create')

            @slot('footer')
                {{ BsForm::submit()->label(trans('orders::orders.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
