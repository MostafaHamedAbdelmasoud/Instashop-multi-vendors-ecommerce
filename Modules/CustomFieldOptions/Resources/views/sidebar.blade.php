@component('dashboard::layouts.components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \Modules\CustomFieldOptions\Entities\CustomFieldOption::class])
    @slot('url', 'custom_field_options')
    @slot('name', trans('custom_field_options::custom_field_options.plural'))
    @slot('isActive', request()->routeIs('custom_field_options*'))
    @slot('icon', 'fas fa-house-user')
    @slot('tree', [
        [
            'name' => trans('custom_field_options::custom_field_options.actions.list'),
            'url' => route('dashboard.custom_field_options.index'),
            'can' => ['ability' => 'viewAny', 'model' => \Modules\CustomFieldOptions\Entities\CustomFieldOption::class],
            'isActive' => request()->routeIs('*custom_field_options.index*'),
        ],
        [
            'name' => trans('custom_field_options::custom_field_options.actions.create'),
            'url' => route('dashboard.custom_field_options.create'),
            'can' => ['ability' => 'create', 'model' =>  \Modules\CustomFieldOptions\Entities\CustomFieldOption::class],
            'isActive' => request()->routeIs('*custom_field_options.create'),
        ]
    ])
@endcomponent
