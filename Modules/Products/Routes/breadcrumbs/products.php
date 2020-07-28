<?php

Breadcrumbs::for('dashboard.products.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('products::products.plural'), route('dashboard.products.index'));
});

Breadcrumbs::for('dashboard.products.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.products.index');
    $breadcrumb->push(trans('products::products.actions.create'), route('dashboard.products.create'));
});

Breadcrumbs::for('dashboard.products.show', function ($breadcrumb, $category) {
    $breadcrumb->parent('dashboard.products.index');
    $breadcrumb->push($category->name, route('dashboard.products.show', $category));
});

Breadcrumbs::for('dashboard.products.edit', function ($breadcrumb, $category) {
    $breadcrumb->parent('dashboard.products.show', $category);
    $breadcrumb->push(trans('products::products.actions.edit'), route('dashboard.products.edit', $category));
});
