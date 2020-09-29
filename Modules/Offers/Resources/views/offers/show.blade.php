@extends('dashboard::layouts.master', ['title' => $offer->code])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $offer->code)
        @slot('breadcrumbs', ['dashboard.Offers.show', $offer])

        <div class="row">
            <div class="col-md-12">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-striped table-middle">
                        <tbody>
                        <tr>
                            <th width="200">@lang('Offers::Offers.attributes.code')</th>
                            <td>{{ $offer->code }}</td>
                        </tr>

                        <tr>
                            <th width="200">@lang('Offers::Offers.attributes.fixed_discount')</th>
                            <td>
                                {{$offer->get_fixed_discount()}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('Offers::Offers.attributes.percentage_discount')</th>
                            <td>
                                {{$offer->get_percentage_discount()}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('Offers::Offers.attributes.max_usage_per_order')</th>
                            <td>
                                    {{$offer->max_usage_per_order}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('Offers::Offers.attributes.max_usage_per_user')</th>
                            <td>
                                    {{$offer->max_usage_per_user}}
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('Offers::Offers.attributes.min_total')</th>
                            <td>
                                    {{$offer->get_min_total()}}
                            </td>
                        </tr>




                        </tbody>
                    </table>

                    @slot('footer')
                        @include('Offers::Offers.partials.actions.edit')
                        @include('Offers::Offers.partials.actions.delete')
                    @endslot
                @endcomponent
            </div>
        </div>





    @endcomponent
@endsection
