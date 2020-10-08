@can('create', \Modules\TemplateBanners\Entities\TemplateBanner::class)
    <a href="{{ route('dashboard.template_banners.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('template_banners::template_banners.actions.create')
    </a>
@endcan
