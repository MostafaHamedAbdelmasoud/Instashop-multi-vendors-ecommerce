@extends('dashboard::layouts.master', ['title' => trans('accounts::customers.plural')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('accounts::customers.plural'))

        @slot('breadcrumbs', ['dashboard.customers.index'])

        @include('accounts::customers.partials.filter')

        @component('dashboard::layouts.components.table-box')

            @slot('title', trans('accounts::customers.actions.list'))

            @slot('tools')
                @include('accounts::customers.partials.actions.create')
            @endslot

            <thead>
            <tr>
                <th>@lang('accounts::customers.attributes.name')</th>
                <th class="d-none d-md-table-cell">@lang('accounts::customers.attributes.email')</th>
                <th>@lang('accounts::customers.attributes.phone')</th>
                <th>@lang('accounts::customers.attributes.created_at')</th>
                <th style="width: 160px">...</th>
            </tr>
            </thead>
            <tbody>
            @forelse($customers as $customer)
                <tr>
                    <td>
                        <a href="{{ route('dashboard.customers.show', $customer) }}"
                           class="text-decoration-none text-ellipsis">
                            <span class="index-flag">
                            @include('accounts::customers.partials.flags.svg')
                            </span>
                            <img src="{{ $customer->getAvatar() }}"
                                 alt="Product 1"
                                 class="img-circle img-size-32 mr-2">
                            {{ $customer->name }}
                        </a>
                    </td>

                    <td class="d-none d-md-table-cell">
                        {{ $customer->email }}
                    </td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->created_at->format('Y-m-d') }}</td>

                    <td style="width: 160px">
                        @include('accounts::customers.partials.actions.show')
                        @include('accounts::customers.partials.actions.edit')
                        @include('accounts::customers.partials.actions.delete')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="text-center">@lang('accounts::customers.empty')</td>
                </tr>
            @endforelse

            @if($customers->hasPages())
                @slot('footer')
                    {{ $customers->links() }}
                @endslot
            @endif
        @endcomponent

    @endcomponent
@endsection
