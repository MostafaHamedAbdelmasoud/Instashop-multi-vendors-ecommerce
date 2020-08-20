@can('update', $subscription)
    @if($subscription->get_model_type() == 'shipping_company')

        <a href="{{ route('dashboard.edit_shipping_company', $subscription) }}" class="btn btn-outline-primary btn-sm">
            <i class="fas fa fa-fw fa-user-edit"></i>
        </a>
    @else

        <a href="{{ route('dashboard.subscriptions.edit', $subscription) }}" class="btn btn-outline-primary btn-sm">
            <i class="fas fa fa-fw fa-user-edit"></i>
        </a>
    @endif
    @endcan
