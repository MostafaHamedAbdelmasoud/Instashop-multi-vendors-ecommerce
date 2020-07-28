@component('dashboard::layouts.components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \Modules\Categories\Entities\Category::class])
    @slot('url', 'categories')
    @slot('name', trans('categories::categories.plural'))
    @slot('isActive', request()->routeIs('categories*'))
    @slot('icon', 'fas fa-tags')
    @slot('tree', [
        [
            'name' => trans('categories::categories.actions.list'),
            'url' => route('dashboard.categories.index'),
            'can' => ['ability' => 'viewAny', 'model' => \Modules\Categories\Entities\Category::class],
            'isActive' => request()->routeIs('*categories.index*'),
        ],
        [
            'name' => trans('categories::categories.actions.create'),
            'url' => route('dashboard.categories.create'),
            'can' => ['ability' => 'create', 'model' =>  \Modules\Categories\Entities\Category::class],
            'isActive' => request()->routeIs('*categories.create'),
        ]
    ])
@endcomponent
