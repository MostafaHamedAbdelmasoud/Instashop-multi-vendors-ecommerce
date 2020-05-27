@extends('dashboard::layouts.master', ['title' => trans('accounts::shipping_company_owners.plural')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('accounts::shipping_company_owners.plural'))

        @slot('breadcrumbs', ['dashboard.shipping_company_owners.index'])

        @include('accounts::shipping_company_owners.partials.filter')

        @component('dashboard::layouts.components.table-box')

            @slot('title', trans('accounts::shipping_company_owners.actions.list'))

            @slot('tools')
                @include('accounts::shipping_company_owners.partials.actions.create')
            @endslot

            <thead>
            <tr>
                <th>@lang('accounts::shipping_company_owners.attributes.name')</th>
                <th class="d-none d-md-table-cell">@lang('accounts::shipping_company_owners.attributes.email')</th>
                <th>@lang('accounts::shipping_company_owners.attributes.phone')</th>
                <th>@lang('accounts::shipping_company_owners.attributes.created_at')</th>
                <th style="width: 160px">...</th>
            </tr>
            </thead>
            <tbody>
            @forelse($shippingCompanyOwners as $shippingCompanyOwner)
                <tr>
                    <td>
                        <a href="{{ route('dashboard.shipping_company_owners.show', $shippingCompanyOwner) }}"
                           class="text-decoration-none text-ellipsis">
                            <span class="index-flag">
                            @include('accounts::shipping_company_owners.partials.flags.svg')
                            </span>
                            <img src="{{ $shippingCompanyOwner->getAvatar() }}"
                                 alt="Product 1"
                                 class="img-circle img-size-32 mr-2">
                            {{ $shippingCompanyOwner->name }}
                        </a>
                    </td>

                    <td class="d-none d-md-table-cell">
                        {{ $shippingCompanyOwner->email }}
                    </td>
                    <td>{{ $shippingCompanyOwner->phone }}</td>
                    <td>{{ $shippingCompanyOwner->created_at->format('Y-m-d') }}</td>

                    <td style="width: 160px">
                        @include('accounts::shipping_company_owners.partials.actions.show')
                        @include('accounts::shipping_company_owners.partials.actions.edit')
                        @include('accounts::shipping_company_owners.partials.actions.delete')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="text-center">@lang('accounts::shipping_company_owners.empty')</td>
                </tr>
            @endforelse

            @if($shippingCompanyOwners->hasPages())
                @slot('footer')
                    {{ $shippingCompanyOwners->links() }}
                @endslot
            @endif
        @endcomponent

    @endcomponent
@endsection
