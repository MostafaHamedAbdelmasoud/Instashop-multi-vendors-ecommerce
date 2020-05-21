@extends('dashboard::layouts.master', ['title' => trans('accounts::delegates.plural')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('accounts::delegates.plural'))

        @slot('breadcrumbs', ['dashboard.delegates.index'])

        @include('accounts::delegates.partials.filter')

        @component('dashboard::layouts.components.table-box')

            @slot('title', trans('accounts::delegates.actions.list'))

            @slot('tools')
                @include('accounts::delegates.partials.actions.create')
            @endslot

            <thead>
            <tr>
                <th>@lang('accounts::delegates.attributes.name')</th>
                <th class="d-none d-md-table-cell">@lang('accounts::delegates.attributes.email')</th>
                <th>@lang('accounts::delegates.attributes.phone')</th>
                <th>@lang('accounts::delegates.attributes.created_at')</th>
                <th style="width: 160px">...</th>
            </tr>
            </thead>
            <tbody>
            @forelse($delegates as $delegate)
                <tr>
                    <td>
                        <a href="{{ route('dashboard.delegates.show', $delegate) }}"
                           class="text-decoration-none text-ellipsis">
                            <span class="index-flag">
                            @include('accounts::delegates.partials.flags.svg')
                            </span>
                            <img src="{{ $delegate->getAvatar() }}"
                                 alt="Product 1"
                                 class="img-circle img-size-32 mr-2">
                            {{ $delegate->name }}
                        </a>
                    </td>

                    <td class="d-none d-md-table-cell">
                        {{ $delegate->email }}
                    </td>
                    <td>{{ $delegate->phone }}</td>
                    <td>{{ $delegate->created_at->format('Y-m-d') }}</td>

                    <td style="width: 160px">
                        @include('accounts::delegates.partials.actions.show')
                        @include('accounts::delegates.partials.actions.edit')
                        @include('accounts::delegates.partials.actions.delete')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="text-center">@lang('accounts::delegates.empty')</td>
                </tr>
            @endforelse

            @if($delegates->hasPages())
                @slot('footer')
                    {{ $delegates->links() }}
                @endslot
            @endif
        @endcomponent

    @endcomponent
@endsection
