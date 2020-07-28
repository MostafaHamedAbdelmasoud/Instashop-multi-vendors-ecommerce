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
                            <th width="200">@lang('custom_field_options::custom_field_options.attributes.category_id')</th>
                            <td>
                                <a href="{{ route('dashboard.categories.show', $customFieldOption->category) }}"
                                   class="text-decoration-none text-ellipsis">
                                    {{$customFieldOption->getCategoryOfCustomField()}}
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <th width="200">@lang('custom_field_options::custom_field_options.attributes.store_id')</th>
                            <td>
                                <a href="{{ route('dashboard.stores.show', $customFieldOption->store) }}"
                                   class="text-decoration-none text-ellipsis">
                                    {{$customFieldOption->getStoreOfCustomField()}}
                                </a>
                            </td>
                        </tr>


                        <tr>
                            <th width="200">@lang('custom_field_options::custom_field_options.attributes.type')</th>
                            <td>
                                {{$customFieldOption->type}}
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
