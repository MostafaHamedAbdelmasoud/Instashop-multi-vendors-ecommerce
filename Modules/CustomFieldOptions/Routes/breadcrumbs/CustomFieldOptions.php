<?php

Breadcrumbs::for('dashboard.custom_field_options.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('custom_field_options::custom_field_options.plural'), route('dashboard.custom_field_options.index'));
});

Breadcrumbs::for('dashboard.custom_field_options.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.custom_field_options.index');
    $breadcrumb->push(trans('custom_field_options::custom_field_options.actions.create'), route('dashboard.custom_field_options.create'));
});

Breadcrumbs::for('dashboard.custom_field_options.show', function ($breadcrumb, $customFieldOption) {
    $breadcrumb->parent('dashboard.custom_field_options.index');
    $breadcrumb->push($customFieldOption->name, route('dashboard.custom_field_options.show', $customFieldOption));
});

Breadcrumbs::for('dashboard.custom_field_options.edit', function ($breadcrumb, $customFieldOption) {
    $breadcrumb->parent('dashboard.custom_field_options.show', $customFieldOption);
    $breadcrumb->push(trans('custom_field_options::custom_field_options.actions.edit'), route('dashboard.custom_field_options.edit', $customFieldOption));
});
