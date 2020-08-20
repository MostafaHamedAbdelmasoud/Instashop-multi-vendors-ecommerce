@extends('dashboard::layouts.master', ['title' => trans('subscriptions::subscriptions.actions.create')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('subscriptions::subscriptions.plural'))
        @slot('breadcrumbs', ['dashboard.create_shipping_company'])


        {{ BsForm::resource('subscriptions::subscriptions')->post(route('dashboard.subscriptions.store') , ['files' => true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('subscriptions::subscriptions.actions.create'))


            @include('subscriptions::subscriptions.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('subscriptions::subscriptions.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}



    @endcomponent
@endsection
