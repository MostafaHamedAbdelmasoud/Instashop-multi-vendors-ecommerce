@extends('dashboard::layouts.master', ['title' => $city->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $city->name)
        @slot('breadcrumbs', ['dashboard.cities.show', $city])

        <div class="row">
            <div class="col-md-12">
                @component('dashboard::layouts.components.box')
                    @slot('bodyClass', 'p-0')

                    <table class="table table-striped">
                        <tr>
                            <th>@lang('countries::cities.attributes.name')</th>
                            <td>{{ $city->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('countries::cities.attributes.country')</th>
                            <td>{{ $city->country->name }}</td>
                        </tr>
                    </table>

                    @slot('footer')
                        @include('countries::cities.partials.actions.edit')
                        @include('countries::cities.partials.actions.delete')
                    @endslot
                @endcomponent
            </div>
        </div>

    @endcomponent
@endsection
