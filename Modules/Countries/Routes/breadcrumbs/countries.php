<?php

Breadcrumbs::for('dashboard.countries.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('countries::countries.plural'), route('dashboard.countries.index'));
});

Breadcrumbs::for('dashboard.countries.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.countries.index');
    $breadcrumb->push(trans('countries::countries.actions.create'), route('dashboard.countries.create'));
});

Breadcrumbs::for('dashboard.countries.show', function ($breadcrumb, $country) {
    $breadcrumb->parent('dashboard.countries.index');
    $breadcrumb->push($country->name, route('dashboard.countries.show', $country));
});

Breadcrumbs::for('dashboard.countries.edit', function ($breadcrumb, $country) {
    $breadcrumb->parent('dashboard.countries.show', $country);
    $breadcrumb->push(trans('countries::countries.actions.edit'), route('dashboard.countries.edit', $country));
});
