@extends('dashboard::layouts.master', ['title' => $address->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $address->name)
        @slot('breadcrumbs', ['dashboard.customers.addresses.edit', $customer, $address])

        {{ BsForm::resource('accounts::addresses')->putModel($address, route('dashboard.customers.addresses.update', [$customer, $address])) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('accounts::addresses.actions.edit'))

            @include('accounts::addresses.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('accounts::addresses.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
