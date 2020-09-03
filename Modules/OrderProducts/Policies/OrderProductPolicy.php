<?php

namespace Modules\OrderProducts\Policies;

use Modules\Accounts\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\OrderProducts\Entities\OrderProduct;

/**
 * Class StorePolicy.
 */
class OrderProductPolicy
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
     * @param OrderProduct $orderProduct
     * @return bool
     */
    public function view(User $user, OrderProduct $orderProduct)
    {
        return $user->isAdmin() || $user->is($orderProduct->coupon->user);
    }

    /**
     * Determine whether the user can create categories.
     *
     * @param \Modules\Accounts\Entities\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->is($coupon->user);
    }

    /**
     * Determine whether the user can update the address.
     *
     * @param \Modules\Accounts\Entities\User $user
     * @param OrderProduct $orderProduct
     * @return mixed
     */
    public function update(User $user, OrderProduct $orderProduct)
    {
        return $user->isAdmin() || $user->is($orderProduct->coupon->user);
    }

    /**
     * Determine whether the user can delete the address.
     *
     * @param \Modules\Accounts\Entities\User $user
     * @param OrderProduct $orderProduct
     * @return mixed
     */
    public function delete(User $user, OrderProduct $orderProduct)
    {
        return $user->isAdmin() || $user->is($orderProduct->coupon->user);
    }
}
