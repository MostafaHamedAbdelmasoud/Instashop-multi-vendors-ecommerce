@extends('dashboard::layouts.master', ['title' => trans('accounts::store_owners.plural')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('accounts::store_owners.plural'))

        @slot('breadcrumbs', ['dashboard.store_owners.index'])

        @include('accounts::store_owners.partials.filter')

        @component('dashboard::layouts.components.table-box')

            @slot('title', trans('accounts::store_owners.actions.list'))

            @slot('tools')
                @include('accounts::store_owners.partials.actions.create')
            @endslot

            <thead>
            <tr>
                <th>@lang('accounts::store_owners.attributes.name')</th>
                <th class="d-none d-md-table-cell">@lang('accounts::store_owners.attributes.email')</th>
                <th>@lang('accounts::store_owners.attributes.phone')</th>
                <th>@lang('accounts::store_owners.attributes.created_at')</th>
                <th style="width: 160px">...</th>
            </tr>
            </thead>
            <tbody>
            @forelse($storeOwners as $storeOwner)
                <tr>
                    <td>
                        <a href="{{ route('dashboard.store_owners.show', $storeOwner) }}"
                           class="text-decoration-none text-ellipsis">
                            <span class="index-flag">
                            @include('accounts::store_owners.partials.flags.svg')
                            </span>
                            <img src="{{ $storeOwner->getAvatar() }}"
                                 alt="Product 1"
                                 class="img-circle img-size-32 mr-2">
                            {{ $storeOwner->name }}
                        </a>
                    </td>

                    <td class="d-none d-md-table-cell">
                        {{ $storeOwner->email }}
                    </td>
                    <td>{{ $storeOwner->phone }}</td>
                    <td>{{ $storeOwner->created_at->format('Y-m-d') }}</td>

                    <td style="width: 160px">
                        @include('accounts::store_owners.partials.actions.show')
                        @include('accounts::store_owners.partials.actions.edit')
                        @include('accounts::store_owners.partials.actions.delete')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="text-center">@lang('accounts::store_owners.empty')</td>
                </tr>
            @endforelse

            @if($storeOwners->hasPages())
                @slot('footer')
                    {{ $storeOwners->links() }}
                @endslot
            @endif
        @endcomponent

    @endcomponent
@endsection
