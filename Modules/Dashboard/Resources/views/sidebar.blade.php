@component('dashboard::layouts.components.sidebarItem')
    @slot('url', route('dashboard.home'))
    @slot('name', trans('dashboard::dashboard.home'))
    @slot('icon', 'fas fa-tachometer-alt')
    @slot('routeActive', 'dashboard.home')
@endcomponent
@include('countries::sidebar')
@include('accounts::sidebar')
@include('stores::sidebar')
@include('categories::sidebar')
@include('products::sidebar')
@include('custom_fields::sidebar')
@include('custom_field_options::sidebar')

