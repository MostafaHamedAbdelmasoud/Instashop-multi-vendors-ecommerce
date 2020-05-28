@extends('dashboard::layouts.master', ['title' => $shippingCompanyOwner->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $shippingCompanyOwner->name)
        @slot('breadcrumbs', ['dashboard.shipping_company_owners.show', $shippingCompanyOwner])
        @component('dashboard::layouts.components.box')
            @slot('bodyClass', 'p-0')

            <table class="table table-striped table-middle">
                <tbody>
                <tr>
                    <th width="200">@lang('accounts::shipping_company_owners.attributes.name')</th>
                    <td>{{ $shippingCompanyOwner->name }}</td>
                </tr>
                <tr>
                    <th width="200">@lang('accounts::shipping_company_owners.attributes.email')</th>
                    <td>{{ $shippingCompanyOwner->email }}</td>
                </tr>
                <tr>
                    <th width="200">@lang('accounts::shipping_company_owners.attributes.phone')</th>
                    <td>{{ $shippingCompanyOwner->phone }}</td>
                </tr>
                <tr>
                    <th width="200">@lang('accounts::shipping_company_owners.attributes.avatar')</th>
                    <td>
                        <img src="{{ $shippingCompanyOwner->getAvatar() }}"
                             class="img img-size-64"
                             alt="{{ $shippingCompanyOwner->name }}">
                    </td>
                </tr>
                </tbody>
            </table>

            @slot('footer')
                @include('accounts::shipping_company_owners.partials.actions.edit')
                @include('accounts::shipping_company_owners.partials.actions.delete')
            @endslot
        @endcomponent
        <div class="row">
            <div class="col-md-4">
                {{ BsForm::resource('accounts::shipping_companies')
                    ->post(route('dashboard.shipping_company_owners.shipping_companies.store', $shippingCompanyOwner)) }}
                @component('dashboard::layouts.components.box')
                    @slot('title', trans('accounts::shipping_companies.actions.create'))

                    @include('accounts::shipping_companies.partials.form')

                    @slot('footer')
                        {{ BsForm::submit()->label(trans('accounts::shipping_companies.actions.save')) }}
                    @endslot
                @endcomponent
                {{ BsForm::close() }}
            </div>
            <div class="col-md-8">
                @component('dashboard::layouts.components.table-box')

                    @slot('title', trans('accounts::shipping_companies.actions.list'))

                    <thead>
                    <tr>
                        <th>@lang('accounts::shipping_companies.attributes.name')</th>

                            <th>@lang('accounts::shipping_companies.attributes.price')</th>
                            <th>@lang('accounts::shipping_companies.attributes.city')</th>
                            <th>@lang('accounts::shipping_companies.attributes.country')</th>

                        <th style="width: 160px">...</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($shippingCompanies as $shippingCompany)

                            @foreach($shippingCompany->shippingCompanyPrices as $shippingCompanyPrice)

                        <tr>
                            <td>{{ $shippingCompany->name }}</td>
                            <td>{{ $shippingCompanyPrice->price }}</td>
                            <td>{{ $shippingCompanyPrice->City()->first()->name }}</td>
                            <td>{{ $shippingCompanyPrice->City()->first()->country()->first()->name }}</td>
                            <td style="width: 160px">
                                @include('accounts::shipping_companies.partials.actions.edit')
                                @include('accounts::shipping_companies.partials.actions.delete')

                            </td>
                        </tr>
                            @endforeach
                    @empty
                        <tr>
                            <td colspan="100" class="text-center">@lang('accounts::shipping_companies.empty')</td>
                        </tr>
                    @endforelse

                    @if($shippingCompanies->hasPages())
                        @slot('footer')
                            {{ $shippingCompanies->links() }}
                        @endslot
                    @endif
                @endcomponent
            </div>
        </div>

    @endcomponent
@endsection
