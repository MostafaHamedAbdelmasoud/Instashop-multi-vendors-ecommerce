@extends('dashboard::layouts.master', ['title' => $order->id])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $order->id)
        @slot('breadcrumbs', ['dashboard.order_status_updatesorder_status_updates.show', $order])

        <div class="row">
            <div class="col-md-12">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-striped table-middle">
                        <tbody>
                        <tr>
                            <th width="200">@lang('orders::order_status_updatesorder_status_updates.attributes.id')</th>
                            <td>{{ $order->id }}</td>
                        </tr>

                        <tr>
                            <th width="200">@lang('orders::order_status_updatesorder_status_updates.attributes.user_id')</th>
                            <td>
                                <a href="{{ route('dashboard.customers.show', $order->user) }}"
                                   class="text-decoration-none text-ellipsis">
                                    {{ $order->getUserName() }}
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('orders::order_status_updatesorder_status_updates.attributes.user_id')</th>
                            <td class="d-none d-md-table-cell">
                                {{$order->getAddress()}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('orders::order_status_updatesorder_status_updates.attributes.shipping_company_id')</th>
                            <td>
                                <a href="{{ route('dashboard.shipping_company_owners.show',$order->shipping_company->ShippingCompanyOwner) }}"
                                   class="text-decoration-none text-ellipsis">
                                    {{$order->getShippingCompanyName()}}
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('orders::order_status_updatesorder_status_updates.attributes.coupon_id')</th>
                            <td>
                                <a href="{{ route('dashboard.coupons.show', $order->coupon) }}"
                                   class="text-decoration-none text-ellipsis">
                                    {{$order->getCouponCode()}}
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('orders::order_status_updatesorder_status_updates.attributes.shipping_company_notes')</th>
                            <td>
                                {{$order->shipping_company_notes}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('orders::order_status_updatesorder_status_updates.attributes.subtotal')</th>
                            <td class="d-none d-md-table-cell">
                                <del>
                                    {{$order->subtotal}}
                                </del>
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('orders::order_status_updatesorder_status_updates.attributes.discount')</th>
                            <td class="d-none d-md-table-cell">
                                {{$order->getDiscountValue()}}
                            </td>
                        </tr>


                        <tr>
                            <th width="200">@lang('orders::order_status_updatesorder_status_updates.attributes.total')</th>
                            <td>
                                {{$order->total}}
                            </td>
                        </tr>


                        </tbody>
                    </table>

                    @slot('footer')
                        @include('orders::order_status_updates.partials.actions.edit')
                        @include('orders::order_status_updates.partials.actions.delete')
                    @endslot
                @endcomponent

                    </div>
                </div>
    @endcomponent
@endsection
