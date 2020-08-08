<?php

namespace Modules\Subscriptions\Policies;

use Modules\Accounts\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Subscriptions\Entities\Subscription;

/**
 * Class StorePolicy.
 */
class SubscriptionPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the store.
     * @param User $user
     * @param Subscription $subscription
     * @return bool
     */
    public function view(User $user, Subscription $subscription)
    {
        return $user->isAdmin() || $user->is($subscription->store->StoreOwner);
    }

    /**
     * Determine whether the user can create categories.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->is($store->StoreOwner);
    }

    /**
     * Determine whether the user can update the address.
     *
     * @param User $user
     * @param Subscription $subscription
     * @return mixed
     */
    public function update(User $user, Subscription $subscription)
    {
        return $user->isAdmin() || $user->is($subscription->store->storeOwner);
    }

    /**
     * Determine whether the user can delete the address.
     *
     * @param User $user
     * @param Subscription $subscription
     * @return mixed
     */
    public function delete(User $user, Subscription $subscription)
    {
        return $user->isAdmin() || $user->is($subscription->store->StoreOwner);
    }
}
