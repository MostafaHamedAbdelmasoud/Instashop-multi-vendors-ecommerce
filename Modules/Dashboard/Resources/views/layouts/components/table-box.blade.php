<div class="card">
    <div class="card-header border-0">
        <h3 class="card-title">{{ $title ?? '' }}</h3>
        <div class="card-tools">
            {{ $tools ?? '' }}
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover table-striped table-valign-middle">
            {{ $slot }}
        </table>
    </div>
    @isset($footer)
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endisset
</div>
