@extends('dashboard::layouts.master', ['title' => trans('accounts::shipping_company_owners.actions.create')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('accounts::shipping_company_owners.plural'))
        @slot('breadcrumbs', ['dashboard.shipping_company_owners.create'])

        {{ BsForm::resource('accounts::shipping_company_owners')->post(route('dashboard.shipping_company_owners.store'), ['files' => true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('accounts::shipping_company_owners.actions.create'))

            @include('accounts::shipping_company_owners.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('accounts::shipping_company_owners.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection

