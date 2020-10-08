@can('view', $templateBanner)
    <a href="{{ route('dashboard.template_banners.show', $templateBanner) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
