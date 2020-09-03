@extends('dashboard::layouts.master', ['title' => trans('order_products::order_products.actions.create')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('order_products::order_products.plural'))
        @slot('breadcrumbs', ['dashboard.order_products.create'])

        {{ BsForm::resource('order_products::order_products')->post(route('dashboard.order_products.store') , ['files' => true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('order_products::order_products.actions.create'))

            @include('order_products::order_products.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('order_products::order_products.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
