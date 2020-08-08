@can('view', $subscription)
    <a href="{{ route('dashboard.subscriptions.show', $subscription) }}" class="btn btn-outline-dark btn-sm">
        <i class="fas fa fa-fw fa-eye"></i>
    </a>
@endcan
