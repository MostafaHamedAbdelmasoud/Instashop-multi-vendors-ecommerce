@extends('dashboard::layouts.master', ['title' => $shippingCompanyOwner->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $shippingCompanyOwner->name)
        @slot('breadcrumbs', ['dashboard.shipping_company_owners.edit', $shippingCompanyOwner])

        {{ BsForm::resource('accounts::shipping_company_owners')->putModel($shippingCompanyOwner, route('dashboard.shipping_company_owners.update', $shippingCompanyOwner), ['files' => true]) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('accounts::shipping_company_owners.actions.edit'))

            @include('accounts::shipping_company_owners.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('accounts::shipping_company_owners.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
