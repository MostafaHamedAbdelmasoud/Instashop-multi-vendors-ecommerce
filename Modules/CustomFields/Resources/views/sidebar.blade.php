@component('dashboard::layouts.components.sidebarItem')
    @slot('can', ['ability' => 'viewAny', 'model' => \Modules\CustomFields\Entities\CustomField::class])
    @slot('url', 'custom_fields')
    @slot('name', trans('custom_fields::custom_fields.plural'))
    @slot('isActive', request()->routeIs('custom_fields*'))
    @slot('icon', 'fas fa-edit')
    @slot('tree', [
        [
            'name' => trans('custom_fields::custom_fields.actions.list'),
            'url' => route('dashboard.custom_fields.index'),
            'can' => ['ability' => 'viewAny', 'model' => \Modules\CustomFields\Entities\CustomField::class],
            'isActive' => request()->routeIs('*custom_fields.index*'),
        ],
        [
            'name' => trans('custom_fields::custom_fields.actions.create'),
            'url' => route('dashboard.custom_fields.create'),
            'can' => ['ability' => 'create', 'model' =>  \Modules\CustomFields\Entities\CustomField::class],
            'isActive' => request()->routeIs('*custom_fields.create'),
        ]
    ])
@endcomponent
