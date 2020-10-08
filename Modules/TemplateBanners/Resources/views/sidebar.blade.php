@component('dashboard::layouts.components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \Modules\TemplateBanners\Entities\TemplateBanner::class])
    @slot('url', 'template_banners')
    @slot('name', trans('template_banners::template_banners.plural'))
    @slot('isActive', request()->routeIs('template_banners*'))
    @slot('icon', 'fas fa-barcode')
    @slot('tree', [
        [
            'name' => trans('template_banners::template_banners.actions.list'),
            'url' => route('dashboard.template_banners.index'),
            'can' => ['ability' => 'viewAny', 'model' => \Modules\TemplateBanners\Entities\TemplateBanner::class],
            'isActive' => request()->routeIs('*template_banners.index*'),
        ],
        [
            'name' => trans('template_banners::template_banners.actions.create'),
            'url' => route('dashboard.template_banners.create'),
            'can' => ['ability' => 'create', 'model' =>  \Modules\TemplateBanners\Entities\TemplateBanner::class],
            'isActive' => request()->routeIs('*template_banners.create'),
        ]
    ])
@endcomponent
