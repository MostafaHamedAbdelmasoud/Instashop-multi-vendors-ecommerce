@can('create', \Modules\Subscriptions\Entities\Subscription::class)
    <a href="{{ route('dashboard.subscriptions.create', request()->only('type')) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('subscriptions::subscriptions.actions.create')
    </a>
@endcan
