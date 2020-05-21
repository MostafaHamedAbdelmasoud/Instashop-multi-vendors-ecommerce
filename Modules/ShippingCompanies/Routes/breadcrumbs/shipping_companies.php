<?php

Breadcrumbs::for('dashboard.shipping_companies.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('ShippingCompanies::shipping_companies.plural'), route('dashboard.shipping_companies.index'));
});

Breadcrumbs::for('dashboard.shipping_companies.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.shipping_companies.index');
    $breadcrumb->push(trans('ShippingCompanies::shipping_companies.actions.create'), route('dashboard.shipping_companies.create'));
});

Breadcrumbs::for('dashboard.shipping_companies.show', function ($breadcrumb, $shippingCompanyOwner) {
    $breadcrumb->parent('dashboard.shipping_companies.index');
    $breadcrumb->push($shippingCompanyOwner->name, route('dashboard.shipping_companies.show', $shippingCompanyOwner));
});

Breadcrumbs::for('dashboard.shipping_companies.edit', function ($breadcrumb, $shippingCompanyOwner) {
    $breadcrumb->parent('dashboard.shipping_companies.show', $shippingCompanyOwner);
    $breadcrumb->push(trans('ShippingCompanies::shipping_companies.actions.edit'), route('dashboard.shipping_companies.edit', $shippingCompanyOwner));
});
