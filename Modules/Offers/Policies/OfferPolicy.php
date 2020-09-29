<?php

namespace Modules\Offers\Policies;

use Modules\Offers\Entities\Offer;
use Modules\Accounts\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class StorePolicy.
 */
class OfferPolicy
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
     * @param Offer $offer
     * @return bool
     */
    public function view(User $user, Offer $offer)
    {
        return $user->isAdmin() || $user->is($offer->model->user_id);
    }

    /**
     * Determine whether the user can create categories.
     *
     * @param \Modules\Accounts\Entities\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->isStoreOwner();
    }

    /**
     * Determine whether the user can update the address.
     *
     * @param \Modules\Accounts\Entities\User $user
     * @param Offer $offer
     * @return mixed
     */
    public function update(User $user, Offer $offer)
    {
        return $user->isAdmin() || $user->is($offer->order->user_id);
    }

    /**
     * Determine whether the user can delete the address.
     *
     * @param \Modules\Accounts\Entities\User $user
     * @param Offer $offer
     * @return mixed
     */
    public function delete(User $user, Offer $offer)
    {
        return $user->isAdmin() || $user->is($offer->order->user_id);
    }
}
