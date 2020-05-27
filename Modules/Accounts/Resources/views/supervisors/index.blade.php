@extends('dashboard::layouts.master', ['title' => trans('accounts::supervisors.plural')])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('accounts::supervisors.plural'))

        @slot('breadcrumbs', ['dashboard.supervisors.index'])

        @include('accounts::supervisors.partials.filter')

        @component('dashboard::layouts.components.table-box')

            @slot('title', trans('accounts::supervisors.actions.list'))

            @slot('tools')
                @include('accounts::supervisors.partials.actions.create')
            @endslot

            <thead>
            <tr>
                <th>@lang('accounts::supervisors.attributes.name')</th>
                <th class="d-none d-md-table-cell">@lang('accounts::supervisors.attributes.email')</th>
                <th>@lang('accounts::supervisors.attributes.phone')</th>
                <th>@lang('accounts::supervisors.attributes.created_at')</th>
                <th style="width: 160px">...</th>
            </tr>
            </thead>
            <tbody>
            @forelse($supervisors as $supervisor)
                <tr>
                    <td>
                        <a href="{{ route('dashboard.supervisors.show', $supervisor) }}"
                           class="text-decoration-none text-ellipsis">
                            <span class="index-flag">
                            @include('accounts::supervisors.partials.flags.svg')
                            </span>
                            <img src="{{ $supervisor->getAvatar() }}"
                                 alt="Product 1"
                                 class="img-circle img-size-32 mr-2">
                            {{ $supervisor->name }}
                        </a>
                    </td>

                    <td class="d-none d-md-table-cell">
                        {{ $supervisor->email }}
                    </td>
                    <td>{{ $supervisor->phone }}</td>
                    <td>{{ $supervisor->created_at->format('Y-m-d') }}</td>

                    <td style="width: 160px">
                        @include('accounts::supervisors.partials.actions.show')
                        @include('accounts::supervisors.partials.actions.edit')
                        @include('accounts::supervisors.partials.actions.delete')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="text-center">@lang('accounts::supervisors.empty')</td>
                </tr>
            @endforelse

            @if($supervisors->hasPages())
                @slot('footer')
                    {{ $supervisors->links() }}
                @endslot
            @endif
        @endcomponent

    @endcomponent
@endsection
