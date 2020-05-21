<div class="card card-default">
    @if(isset($title) || isset($tools))
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? '' }}</h3>

            <div class="card-tools">
                {{ $tools ?? '' }}
            </div>
        </div>
    @endif
    <!-- /.card-header -->
    <div class="card-body {{ $bodyClass ?? '' }}">
        {{ $slot }}
    </div>
    <!-- /.card-body -->
    @isset($footer)
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endisset
</div>
<!-- /.card -->

