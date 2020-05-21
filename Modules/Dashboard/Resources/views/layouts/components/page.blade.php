<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $title }}</h1>
            </div>
            <div class="col-sm-6">
                <div class="d-flex float-sm-right">
                    @isset($breadcrumbs)
                        {{ Breadcrumbs::render(...$breadcrumbs) }}
                    @endisset
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        @include('flash::message')
        {{ $slot }}
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
