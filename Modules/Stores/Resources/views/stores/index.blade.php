@extends('dashboard::layouts.master', ['title' => trans('stores::stores.plural')])

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('stores::stores.plural'))
        @slot('breadcrumbs', ['dashboard.stores.index'])

        @component('dashboard::layouts.components.table-box')
            @slot('title', trans('stores::stores.actions.list'))
            @slot('tools')
                @include('stores::stores.partials.actions.filter')
                @include('stores::stores.partials.actions.create')
            @endslot

            <thead>
            <tr>
                <th>@lang('stores::stores.attributes.name')</th>
                <th>@lang('stores::stores.attributes.avatar')</th>
                <th class="d-none d-md-table-cell">@lang('stores::stores.attributes.domain')</th>
                <th class="d-none d-md-table-cell">@lang('stores::stores.attributes.description')</th>
                <th style="width: 160px">...</th>
            </tr>
            </thead>
            <tbody>
            @forelse($stores as $store)
                <tr>
                    <td>
                        <a href="{{ route('dashboard.stores.show', $store) }}"
                           class="text-decoration-none text-ellipsis">
                            {{ $store->name }}
                        </a>
                    </td>
                    <td>
                        <img src="{{ $store->getStoreAvatar() }}"
                             alt="Product 1"
                             class="img-circle img-size-32 mr-2">

                    </td>
                    <td class="d-none d-md-table-cell">
                        {{ $store->domain }}
                    </td>
                    <td class="d-none d-md-table-cell">

                        @if( strlen($store->description) >20 )
                            {{substr($store->description,20)}}.......
                        @else
                            {{ $store->description }}
                        @endif
                    </td>

                    <td style="width: 160px">
                        @include('stores::stores.partials.actions.show')
                        @include('stores::stores.partials.actions.edit')
                        @include('stores::stores.partials.actions.delete')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="text-center">@lang('stores::stores.empty')</td>
                </tr>
            @endforelse

            @if($stores->hasPages())
                @slot('footer')
                    {{ $stores->links() }}
                @endslot
            @endif
        @endcomponent

    @endcomponent
@endsection
