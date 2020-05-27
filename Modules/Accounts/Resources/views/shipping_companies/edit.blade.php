@extends('dashboard::layouts.master', ['title' => $shippingCompany->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $shippingCompany->name)
        @slot('breadcrumbs', ['dashboard.shipping_company_owners.shipping_companies.edit', $shippingCompanyOwner, $shippingCompany])

        {{ BsForm::resource('accounts::shipping_companies')->putModel($shippingCompany, route('dashboard.shipping_company_owners.shipping_companies.update', [$shippingCompanyOwner, $shippingCompany])) }}
        @component('dashboard::layouts.components.box')
            @slot('title', trans('accounts::shipping_companies.actions.edit'))

            @include('accounts::shipping_companies.partials.form')

            @slot('footer')
                {{ BsForm::submit()->label(trans('accounts::shipping_companies.actions.save')) }}
            @endslot
        @endcomponent
        {{ BsForm::close() }}

    @endcomponent
@endsection
