@extends('dashboard::layouts.master', ['title' => $storeOwner->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $storeOwner->name)
        @slot('breadcrumbs', ['dashboard.store_owners.show', $storeOwner])

        <div class="row">
            <div class="col-md-12">
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info">
                        <h3 class="widget-user-username">{{ $storeOwner->name }}</h3>
                        <h5 class="widget-user-desc">
                            {{ $storeOwner->present()->type }}
                        </h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2"
                             src="{{ $storeOwner->getAvatar() }}"
                             alt="{{ $storeOwner->name }}">
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header mb-2">
                                        <i class="fas fa-envelope fa-lg"></i>
                                    </h5>
                                    <span class="description-text">
                                         {{ $storeOwner->email }}
                                    </span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header mb-2">
                                        <i class="fas fa-phone fa-lg"></i>
                                    </h5>
                                    <span class="description-text">
                                        {{ $storeOwner->phone }}
                                    </span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header mb-2">
                                        <i class="fas fa-calendar-alt fa-lg"></i>
                                    </h5>
                                    <span class="description-text">
                                        {{ $storeOwner->created_at->diffForHumans() }}
                                    </span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->


                        </div>
                        <!-- /.row -->
                        <div class="mt-4">
                            @include('accounts::store_owners.partials.actions.edit')
                            @include('accounts::store_owners.partials.actions.delete')
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-4">
                {{ BsForm::resource('accounts::stores')
                    ->post(route('dashboard.store_owners.stores.store', $storeOwner)) }}
                @component('dashboard::layouts.components.box')
                    @slot('title', trans('accounts::stores.actions.create'))

                    @include('accounts::stores.partials.form')

                    @slot('footer')
                        {{ BsForm::submit()->label(trans('accounts::stores.actions.save')) }}
                    @endslot
                @endcomponent
                {{ BsForm::close() }}
            </div>
            <div class="col-md-8">
                @component('dashboard::layouts.components.table-box')

                    @slot('title', trans('accounts::stores.actions.list'))

                    <thead>
                    <tr>
                        <th>@lang('accounts::stores.attributes.name')</th>
                        <th>@lang('accounts::stores.attributes.domain')</th>
                        <th>@lang('accounts::stores.attributes.rate')</th>
                        <th style="width: 160px">...</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($stores as $store)
                        <tr>
                            <td>{{ $store->name }}</td>
                            <td>{{ $store->domain }}</td>
                            <td>
                                {{ $store->calculateRate() }}
                                <i class="fas fa-star text-yellow"></i>
                            </td>
                            <td style="width: 160px">
                                @include('accounts::stores.partials.actions.edit')
                                @include('accounts::stores.partials.actions.delete')
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="100" class="text-center">@lang('accounts::stores.empty')</td>
                        </tr>
                    @endforelse

                    @if($stores->hasPages())
                        @slot('footer')
                            {{ $stores->links() }}
                        @endslot
                    @endif
                @endcomponent
            </div>
        </div>

    @endcomponent


@endsection
