@extends('dashboard::layouts.master', ['title' => trans('countries::countries.plural')])

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('countries::countries.plural'))
        @slot('breadcrumbs', ['dashboard.countries.index'])

        @component('dashboard::layouts.components.table-box')
            @slot('title', trans('countries::countries.actions.list'))
            @slot('tools')
                @include('countries::countries.partials.actions.filter')
                @include('countries::countries.partials.actions.create')
            @endslot

            <thead>
            <tr>
                <th>@lang('countries::countries.attributes.name')</th>
                <th class="d-none d-md-table-cell">@lang('countries::countries.attributes.code')</th>
                <th class="d-none d-md-table-cell">@lang('countries::countries.attributes.key')</th>
                <th style="width: 160px">...</th>
            </tr>
            </thead>
            <tbody>
            @forelse($countries as $country)
                <tr>
                    <td>
                        <a href="{{ route('dashboard.countries.show', $country) }}"
                           class="text-decoration-none text-ellipsis">

                            <img src="{{ $country->getFlag() }}"
                                 alt="Product 1"
                                 class="img-circle img-size-32 mr-2" style="height: 32px;">
                            {{ $country->name }}
                        </a>
                    </td>
                    <td class="d-none d-md-table-cell">
                        {{ $country->code }}
                    </td>
                    <td class="d-none d-md-table-cell">
                        {{ $country->key }}
                    </td>

                    <td style="width: 160px">
                        @include('countries::countries.partials.actions.show')
                        @include('countries::countries.partials.actions.edit')
                        @include('countries::countries.partials.actions.delete')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="text-center">@lang('countries::countries.empty')</td>
                </tr>
            @endforelse

            @if($countries->hasPages())
                @slot('footer')
                    {{ $countries->links() }}
                @endslot
            @endif
        @endcomponent

    @endcomponent
@endsection
