@extends('dashboard::layouts.master', ['title' => $order->id])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $order->id)
        @slot('breadcrumbs', ['dashboard.orders.show', $order])

        <div class="row">
            <div class="col-md-12">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-striped table-middle">
                        <tbody>
                        <tr>
                            <th width="200">@lang('orders::orders.attributes.id')</th>
                            <td>{{ $order->id }}</td>
                        </tr>

                        <tr>
                            <th width="200">@lang('orders::orders.attributes.user_id')</th>
                            <td>
                                <a href="{{ route('dashboard.customers.show', $order->user) }}"
                                   class="text-decoration-none text-ellipsis">
                                    {{ $order->getUserName() }}
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('orders::orders.attributes.user_id')</th>
                            <td class="d-none d-md-table-cell">
                                {{$order->getAddress()}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('orders::orders.attributes.shipping_company_id')</th>
                            <td>
                                <a href="{{ route('dashboard.shipping_company_owners.show',$order->shipping_company->ShippingCompanyOwner) }}"
                                   class="text-decoration-none text-ellipsis">
                                    {{$order->getShippingCompanyName()}}
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('orders::orders.attributes.coupon_id')</th>
                            <td>
                                <a href="{{ route('dashboard.coupons.show', $order->coupon) }}"
                                   class="text-decoration-none text-ellipsis">
                                    {{$order->getCouponCode()}}
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('orders::orders.attributes.shipping_company_notes')</th>
                            <td>
                                {{$order->shipping_company_notes}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('orders::orders.attributes.subtotal')</th>
                            <td class="d-none d-md-table-cell">
                                <del>
                                    {{$order->subtotal}}
                                </del>
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('orders::orders.attributes.discount')</th>
                            <td class="d-none d-md-table-cell">
                                {{$order->getDiscountValue()}}
                            </td>
                        </tr>


                        <tr>
                            <th width="200">@lang('orders::orders.attributes.total')</th>
                            <td>
                                {{$order->total}}
                            </td>
                        </tr>


                        </tbody>
                    </table>

                    @slot('footer')
                        @include('orders::orders.partials.actions.edit')
                        @include('orders::orders.partials.actions.delete')
                    @endslot
                @endcomponent
                <div class="row">
                    <div class="col-md-4">
                                                    {{ BsForm::resource('orders::order_status_updates')
                                                        ->post(route('dashboard.orders.order_status_updates.store', $order)) }}
                                                    @component('dashboard::layouts.components.box')
                                                        @slot('title', trans('orders::order_status_updates.actions.create'))

                                                        @include('orders::order_status_updates.partials.form')

                                                        @slot('footer')
                                                            {{ BsForm::submit()->label(trans('orders::order_status_updates.actions.save')) }}
                                                        @endslot
                                                    @endcomponent
                                                    {{ BsForm::close() }}
                    </div>
                    <div class="col-md-8">
                        @component('dashboard::layouts.components.table-box')

                            @slot('title', trans('orders::order_status_updates.actions.list'))

                            <thead>
                            <tr>
                                <th>@lang('orders::order_status_updates.attributes.notes')</th>
                                <th>@lang('orders::order_status_updates.attributes.order_status_id')</th>
                                <th style="width: 160px">...</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($orderStatusUpdates as $orderStatusUpdate)
                                <tr>
                                    <td>{{ $orderStatusUpdate->notes }}</td>
                                    <td>{{ $orderStatusUpdate->orderStatus->type }}</td>
                                    <td style="width: 160px">
                                        @include('orders::order_status_updates.partials.actions.edit')
                                        @include('orders::order_status_updates.partials.actions.delete')
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100"
                                        class="text-center">@lang('orders::order_status_updates.empty')</td>
                                </tr>
                            @endforelse

                            @if($orderStatusUpdates->hasPages())
                                @slot('footer')
                                    {{ $orderStatusUpdates->links() }}
                                @endslot
                            @endif
                        @endcomponent
                    </div>
                </div>
    @endcomponent
@endsection
