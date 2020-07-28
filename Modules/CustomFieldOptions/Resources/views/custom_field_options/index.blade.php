@extends('dashboard::layouts.master', ['title' => trans('custom_field_options::custom_field_options.plural')])

@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', trans('custom_field_options::custom_field_options.plural'))
        @slot('breadcrumbs', ['dashboard.custom_field_options.index'])

        @component('dashboard::layouts.components.table-box')
            @slot('title', trans('custom_field_options::custom_field_options.actions.list'))
            @slot('tools')
                @include('custom_field_options::custom_field_options.partials.actions.filter')
                @include('custom_field_options::custom_field_options.partials.actions.create')
            @endslot

            <thead>
            <tr>
                <th>@lang('custom_field_options::custom_field_options.attributes.name')</th>
                <th class="d-none d-md-table-cell">@lang('custom_field_options::custom_field_options.attributes.product_id')</th>
                <th class="d-none d-md-table-cell">@lang('custom_field_options::custom_field_options.attributes.custom_field_id')</th>
                <th class="d-none d-md-table-cell">@lang('custom_field_options::custom_field_options.attributes.additional_price')</th>
                <th style="width: 160px">...</th>
            </tr>
            </thead>
            <tbody>
            @forelse($customFieldOptions as $customFieldOption)
                <tr>
                    <td>
                        <a href="{{ route('dashboard.custom_field_options.show', $customFieldOption) }}"
                           class="text-decoration-none text-ellipsis">
                            {{ $customFieldOption->name }}
                        </a>
                    </td>

                    <td class="d-none d-md-table-cell">
                        <a href="{{ route('dashboard.products.show', $customFieldOption->product) }}"
                           class="text-decoration-none text-ellipsis">
                            {{$customFieldOption->getCustomFieldOptionProductName()}}
                        </a>
                    </td>

                    <td class="d-none d-md-table-cell">
                        <a href="{{ route('dashboard.custom_fields.show', $customFieldOption->customField) }}"
                           class="text-decoration-none text-ellipsis">
                            {{$customFieldOption->getCustomFieldName()}}
                        </a>
                    </td>

                    <td class="d-none d-md-table-cell">
                        {{$customFieldOption->additional_price}}
                    </td>


                    <td style="width: 160px">
                        @include('custom_field_options::custom_field_options.partials.actions.show')
                        @include('custom_field_options::custom_field_options.partials.actions.edit')
                        @include('custom_field_options::custom_field_options.partials.actions.delete')
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="100" class="text-center">@lang('custom_field_options::custom_field_options.empty')</td>
                </tr>
            @endforelse

            @if($customFieldOptions->hasPages())
                @slot('footer')
                    {{ $customFieldOptions->links() }}
                @endslot
            @endif
        @endcomponent

    @endcomponent
@endsection
