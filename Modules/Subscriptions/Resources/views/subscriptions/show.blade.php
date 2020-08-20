@extends('dashboard::layouts.master', ['title' => $subscription->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $subscription->name)
        @slot('breadcrumbs', ['dashboard.subscriptions.show', $subscription])

        <div class="row">
            <div class="col-md-12">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-striped table-middle">
                        <tbody>

                        <tr>
                            <th width="200">@lang('subscriptions::subscriptions.attributes.model_type')</th>
                            <td>{{ __('subscriptions::subscriptions.additions.'.$subscription->model_type) }}</td>
                        </tr>

                        <tr>
                            <th width="200">@lang('subscriptions::subscriptions.additions.model_name')</th>
                            <td>
                                @if($subscription->get_model_type() == 'shipping_company' )
                                    <a href="{{route('dashboard.shipping_company_owners.show', $subscription->get_model()->ShippingCompanyOwner)}}">
                                        {{ $subscription->get_model()->name }}
                                    </a>
                                @else
                                    <a href="{{route('dashboard.stores.show', $subscription->get_model())}}">
                                        {{ $subscription->get_model()->name }}
                                    </a>
                                @endif
                            </td>

                        </tr>

                        <tr>
                            <th width="200">@lang('subscriptions::subscriptions.attributes.start_at')</th>

                            <td>{{$subscription->get_date_with_format($subscription->start_at)}}</td>
                        </tr>

                        <tr>
                            <th width="200">@lang('subscriptions::subscriptions.attributes.end_at')</th>

                            <td>{{$subscription->get_date_with_format($subscription->end_at)}}</td>
                        </tr>

                        <tr>
                            <th width="200">@lang('subscriptions::subscriptions.attributes.paid_amount')</th>
                            <td>
                                {{$subscription->paid_amount}}
                            </td>
                        </tr>

                        </tbody>
                    </table>

                    @slot('footer')
                        @include('subscriptions::subscriptions.partials.actions.edit')
                        @include('subscriptions::subscriptions.partials.actions.delete')
                    @endslot
                @endcomponent
            </div>
        </div>





    @endcomponent
@endsection
