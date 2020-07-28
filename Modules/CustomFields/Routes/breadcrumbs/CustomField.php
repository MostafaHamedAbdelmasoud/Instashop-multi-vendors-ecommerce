<?php

Breadcrumbs::for('dashboard.custom_fields.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('custom_fields::custom_fields.plural'), route('dashboard.custom_fields.index'));
});

Breadcrumbs::for('dashboard.custom_fields.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.custom_fields.index');
    $breadcrumb->push(trans('custom_fields::custom_fields.actions.create'), route('dashboard.custom_fields.create'));
});

Breadcrumbs::for('dashboard.custom_fields.show', function ($breadcrumb, $customField) {
    $breadcrumb->parent('dashboard.custom_fields.index');
    $breadcrumb->push($customField->name, route('dashboard.custom_fields.show', $customField));
});

Breadcrumbs::for('dashboard.custom_fields.edit', function ($breadcrumb, $customField) {
    $breadcrumb->parent('dashboard.custom_fields.show', $customField);
    $breadcrumb->push(trans('custom_fields::custom_fields.actions.edit'), route('dashboard.custom_fields.edit', $customField));
});
