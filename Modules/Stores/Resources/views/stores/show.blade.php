@extends('dashboard::layouts.master', ['title' => $store->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $store->name)
        @slot('breadcrumbs', ['dashboard.stores.show', $store])

        <div class="row">
            <div class="col-md-12">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-striped table-middle">
                        <tbody>
                        <tr>
                            <th width="200">@lang('stores::stores.attributes.name')</th>
                            <td>{{ $store->name }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('stores::stores.attributes.domain')</th>
                            <td>{{ $store->domain }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('stores::stores.attributes.description')</th>
                            <td>{{ $store->description }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('stores::stores.attributes.meta_description')</th>
                            <td>{{ $store->meta_description }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('stores::stores.attributes.keywords')</th>
                            <td>{{ $store->keywords }}</td>
                        </tr>
                        <tr>
                            <th width="200">@lang('stores::stores.attributes.plan')</th>
                            <td>{{$store->plan}}</td>
                        </tr>
                         <tr>
                            <th width="200">@lang('stores::stores.attributes.rate')</th>
                            <td>{{$store->calculateRate()}}
                             <i class="fas fa-star text-yellow"></i>
                            </td>
                        </tr>

                        </tbody>
                    </table>

                    @slot('footer')
                        @include('stores::stores.partials.actions.edit')
                        @include('stores::stores.partials.actions.delete')
                    @endslot
                @endcomponent
{{--                {{ BsForm::resource('stores::cities')--}}
{{--                ->post(route('dashboard.stores.store', $store)) }}--}}
{{--                @component('dashboard::layouts.components.box')--}}
{{--                    @slot('title', trans('stores::stores.actions.create'))--}}
{{--                    @include('dashboard::errors')--}}
{{--                    @bsMultilangualFormTabs--}}
{{--                    {{ BsForm::text('name')->maxlength(255) }}--}}
{{--                    @endBsMultilangualFormTabs--}}

{{--                    @slot('footer')--}}
{{--                        {{ BsForm::submit(trans('stores::cities.actions.save')) }}--}}
{{--                    @endslot--}}
{{--                @endcomponent--}}
{{--                {{ BsForm::close() }}--}}
            </div>
            <div class="col-md-6">
{{--                @component('dashboard::layouts.components.table-box')--}}
{{--                    @slot('bodyClass', 'p-0')--}}
{{--                    @slot('title', trans('stores::cities.plural'))--}}
{{--                    <tr>--}}
{{--                        <th width="100">#</th>--}}
{{--                        <th>@lang('stores::cities.attributes.name')</th>--}}
{{--                        <th>...</th>--}}
{{--                    </tr>--}}
{{--                    @foreach($cities as $city)--}}
{{--                        <tr>--}}
{{--                            <td>{{ $city->id }}</td>--}}
{{--                            <td>{{ $city->name }}</td>--}}
{{--                            <td>--}}
{{--                                @include('stores::cities.partials.actions.edit')--}}
{{--                                @include('stores::cities.partials.actions.delete')--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
{{--                @endcomponent--}}
            </div>
        </div>

    @endcomponent
@endsection
