@extends('dashboard::layouts.master', ['title' => trans('subscriptions::subscriptions.plural')])

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('subscriptions::subscriptions.plural'))
        @slot('breadcrumbs', ['dashboard.subscriptions.index'])

        @component('dashboard::layouts.components.table-box')
            @slot('title', trans('subscriptions::subscriptions.actions.list'))
            @slot('tools')
                @include('subscriptions::subscriptions.partials.actions.filter')
            @endslot

            <thead>
            <tr>
                <th>@lang('subscriptions::subscriptions.attributes.model_type')</th>
                {{--show model name--}}
                <th class="d-none d-md-table-cell">@lang('subscriptions::subscriptions.additions.model_name')</th>
                {{----}}
                <th class="d-none d-md-table-cell">@lang('subscriptions::subscriptions.attributes.paid_amount')</th>
                <th class="d-none d-md-table-cell">@lang('subscriptions::subscriptions.attributes.start_at')</th>
                <th class="d-none d-md-table-cell">@lang('subscriptions::subscriptions.attributes.end_at')</th>
                <th style="width: 160px">...</th>
            </tr>
            </thead>
            <tbody>
            @forelse($subscriptions as $subscription)
                <tr>


                    <td class="d-none d-md-table-cell">
                        @lang('subscriptions::subscriptions.additions.'.$subscription->get_model_type() )
                    </td>

                    <td class="d-none d-md-table-cell">

                        @if($subscription->get_model_type() == 'shipping_company' )
                            <a href="{{ route('dashboard.shipping_company_owners.show', $subscription->get_model()->ShippingCompanyOwner) }}"
                               class="text-decoration-none text-ellipsis">
                                {{$subscription->get_model()->name}}
                            </a>
                        @else
                            <a href="{{ route('dashboard.stores.show', $subscription->get_model()) }}"
                               class="text-decoration-none text-ellipsis">
                                {{$subscription->get_model()->name}}
                            </a>
                        @endif
                    </td>

                    <td class="d-none d-md-table-cell">
                        {{$subscription->paid_amount}}
                    </td>

                    <td class="d-none d-md-table-cell">
                        {{$subscription->get_date_with_format($subscription->start_at)}}
                    </td>

                    <td class="d-none d-md-table-cell">
                        {{$subscription->get_date_with_format($subscription->end_at)}}
                    </td>

                    <td style="width: 160px">
                        @include('subscriptions::subscriptions.partials.actions.show')
                        @include('subscriptions::subscriptions.partials.actions.edit')
                        @include('subscriptions::subscriptions.partials.actions.delete')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="text-center">@lang('subscriptions::subscriptions.empty')</td>
                </tr>
            @endforelse

            @if($subscriptions->hasPages())
                @slot('footer')
                    {{ $subscriptions->links() }}
                @endslot
            @endif
        @endcomponent

    @endcomponent
@endsection
