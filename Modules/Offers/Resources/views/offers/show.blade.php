@extends('dashboard::layouts.master', ['title' => $offer->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $offer->name)
        @slot('breadcrumbs', ['dashboard.offers.show', $offer])

        <div class="row">
            <div class="col-md-12">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-striped table-middle">
                        <tbody>
                        <tr>
                            <th width="200">@lang('offers::offers.attributes.name')</th>
                            <td>{{ $offer->name }}</td>
                        </tr>

                        <tr>
                            <th width="200">@lang('offers::offers.attributes.fixed_discount_price')</th>
                            <td>
                                {{$offer->getFixedDiscountPrice()}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('offers::offers.attributes.percentage_discount_price')</th>
                            <td>
                                {{$offer->getPercentageDiscountPrice()}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('offers::offers.attributes.model_type')</th>
                            <td>
                                    {{$offer->getModelType()}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('offers::offers.attributes.model_id')</th>
                            <td>
                                    {{$offer->getModelName()}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('offers::offers.attributes.expire_at')</th>
                            <td>
                                    {{$offer->expire_at}}
                            </td>
                        </tr>




                        </tbody>
                    </table>

                    @slot('footer')
                        @include('offers::offers.partials.actions.edit')
                        @include('offers::offers.partials.actions.delete')
                    @endslot
                @endcomponent
            </div>
        </div>





    @endcomponent
@endsection
