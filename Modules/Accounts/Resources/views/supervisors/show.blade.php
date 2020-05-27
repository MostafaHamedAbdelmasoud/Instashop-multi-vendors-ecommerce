@extends('dashboard::layouts.master', ['title' => $supervisor->name])
@section('content')
    @component('dashboard::layouts.components.page')
        @slot('title', $supervisor->name)
        @slot('breadcrumbs', ['dashboard.supervisors.show', $supervisor])

        <div class="row">
            <div class="col-md-12">
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info">
                        <h3 class="widget-user-username">{{ $supervisor->name }}</h3>
                        <h5 class="widget-user-desc">
                            {{ $supervisor->present()->type }}
                        </h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2"
                             src="{{ $supervisor->getAvatar() }}"
                             alt="{{ $supervisor->name }}">
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header mb-2">
                                        <i class="fas fa-envelope fa-lg"></i>
                                    </h5>
                                    <span class="description-text">
                                         {{ $supervisor->email }}
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
                                        {{ $supervisor->phone }}
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
                                        {{ $supervisor->created_at->diffForHumans() }}
                                    </span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->

                            
                        </div>
                        <!-- /.row -->
                        <div class="mt-4">
                            @include('accounts::supervisors.partials.actions.edit')
                            @include('accounts::supervisors.partials.actions.delete')
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endcomponent
@endsection
