@extends('dashboard::layouts.master', ['title' => trans('countries::cities.plural')])

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('countries::cities.plural'))
        @slot('breadcrumbs', ['dashboard.cities.index'])

        @component('dashboard::layouts.components.table-box')
            @slot('title', trans('countries::cities.actions.list'))
            @slot('tools')
                @include('countries::cities.partials.actions.filter')
                @include('countries::cities.partials.actions.create')
            @endslot

            <thead>
            <tr>
                <th>@lang('countries::cities.attributes.name')</th>

                <th style="width: 160px">...</th>
            </tr>
            </thead>
            <tbody>
            @forelse($cities as $city)
                <tr>
                    <td>
                        <a href="{{ route('dashboard.cities.show', $city) }}"
                           class="text-decoration-none text-ellipsis">
                            {{ $city->name }}
                        </a>
                    </td>


                    <td style="width: 160px">
                        @include('countries::cities.partials.actions.show')
                        @include('countries::cities.partials.actions.edit')
                        @include('countries::cities.partials.actions.delete')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="text-center">@lang('countries::cities.empty')</td>
                </tr>
            @endforelse

            @if($cities->hasPages())
                @slot('footer')
                    {{ $cities->links() }}
                @endslot
            @endif
        @endcomponent

    @endcomponent
@endsection
