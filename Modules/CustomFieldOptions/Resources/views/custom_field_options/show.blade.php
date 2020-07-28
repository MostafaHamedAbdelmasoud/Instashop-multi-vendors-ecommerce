@extends('dashboard::layouts.master', ['title' => $customFieldOption->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $customFieldOption->name)
        @slot('breadcrumbs', ['dashboard.custom_field_options.show', $customFieldOption])

        <div class="row">
            <div class="col-md-12">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-striped table-middle">
                        <tbody>
                        <tr>
                            <th width="200">@lang('custom_field_options::custom_field_options.attributes.name')</th>
                            <td>{{ $customFieldOption->name }}</td>
                        </tr>


                        <tr>
                            <th width="200">@lang('custom_field_options::custom_field_options.attributes.custom_field_id')</th>
                            <td>
                                <a href="{{ route('dashboard.custom_fields.show', $customFieldOption->customField) }}"
                                   class="text-decoration-none text-ellipsis">
                                    {{$customFieldOption->getCustomFieldName()}}
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('custom_field_options::custom_field_options.attributes.product_id')</th>
                            <td>
                                <a href="{{ route('dashboard.products.show', $customFieldOption->product) }}"
                                   class="text-decoration-none text-ellipsis">
                                    {{$customFieldOption->getCustomFieldOptionProductName()}}
                                </a>
                            </td>
                        </tr>


                        <tr>
                            <th width="200">@lang('custom_field_options::custom_field_options.attributes.additional_price')</th>
                            <td>
                                {{$customFieldOption->additional_price}}
                            </td>
                        </tr>


                        </tbody>
                    </table>

                    @slot('footer')
                        @include('custom_field_options::custom_field_options.partials.actions.edit')
                        @include('custom_field_options::custom_field_options.partials.actions.delete')
                    @endslot
                @endcomponent
            </div>
        </div>





    @endcomponent
@endsection
