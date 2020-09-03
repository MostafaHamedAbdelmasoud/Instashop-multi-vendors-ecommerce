@extends('dashboard::layouts.master', ['title' => trans('order_statuses::order_statuses.plural')])

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('order_statuses::order_statuses.plural'))
        @slot('breadcrumbs', ['dashboard.order_statuses.index'])

        @component('dashboard::layouts.components.table-box')
            @slot('title', trans('order_statuses::order_statuses.actions.list'))
            @slot('tools')
                @include('order_statuses::order_statuses.partials.actions.filter')
                @include('order_statuses::order_statuses.partials.actions.create')
            @endslot

            <thead>
            <tr>
                <th>@lang('order_statuses::order_statuses.attributes.name')</th>
                <th>@lang('order_statuses::order_statuses.attributes.type')</th>
                <th style="width: 160px">...</th>
            </tr>
            </thead>
            <tbody>
            @forelse($orderStatuses as $orderStatus)
                <tr>
                    <td>
                        {{ $orderStatus->name }}
                    </td>

                    <td class="d-none d-md-table-cell">
                        {{$orderStatus->type}}
                    </td>



                    <td style="width: 160px">
                        @include('order_statuses::order_statuses.partials.actions.show')
                        @include('order_statuses::order_statuses.partials.actions.edit')
                        @include('order_statuses::order_statuses.partials.actions.delete')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="text-center">@lang('order_statuses::order_statuses.empty')</td>
                </tr>
            @endforelse

            @if($orderStatuses->hasPages())
                @slot('footer')
                    {{ $orderStatuses->links() }}
                @endslot
            @endif
        @endcomponent

    @endcomponent
@endsection
