<?php

Breadcrumbs::for('dashboard.Offers.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('offers::offers.plural'), route('dashboard.Offers.index'));
});

Breadcrumbs::for('dashboard.Offers.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.Offers.index');
    $breadcrumb->push(trans('offers::offers.actions.create'), route('dashboard.Offers.create'));
});

Breadcrumbs::for('dashboard.Offers.show', function ($breadcrumb, $offer) {
    $breadcrumb->parent('dashboard.Offers.index');
    $breadcrumb->push($offer->code, route('dashboard.Offers.show', $offer));
});

Breadcrumbs::for('dashboard.Offers.edit', function ($breadcrumb, $offer) {
    $breadcrumb->parent('dashboard.Offers.show', $offer);
    $breadcrumb->push(trans('offers::offers.actions.edit'), route('dashboard.Offers.edit', $offer));
});
