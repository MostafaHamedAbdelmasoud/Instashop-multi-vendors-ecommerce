<?php

Breadcrumbs::for('dashboard.template_banners.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('template_banners::template_banners.plural'), route('dashboard.template_banners.index'));
});

Breadcrumbs::for('dashboard.template_banners.create', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.template_banners.index');
    $breadcrumb->push(trans('template_banners::template_banners.actions.create'), route('dashboard.template_banners.create'));
});

Breadcrumbs::for('dashboard.template_banners.show', function ($breadcrumb, $templateBanner) {
    $breadcrumb->parent('dashboard.template_banners.index');
    $breadcrumb->push($templateBanner->code, route('dashboard.template_banners.show', $templateBanner));
});

Breadcrumbs::for('dashboard.template_banners.edit', function ($breadcrumb, $templateBanner) {
    $breadcrumb->parent('dashboard.template_banners.show', $templateBanner);
    $breadcrumb->push(trans('template_banners::template_banners.actions.edit'), route('dashboard.template_banners.edit', $templateBanner));
});
