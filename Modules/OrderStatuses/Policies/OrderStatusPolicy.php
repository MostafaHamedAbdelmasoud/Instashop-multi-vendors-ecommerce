<?php

namespace Modules\OrderStatuses\Policies;

use Modules\Accounts\Entities\User;
use Modules\OrderStatuses\Entities\OrderStatus;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class StorePolicy.
 */
class OrderStatusPolicy
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
     * @param OrderStatus $order
     * @return bool
     */
    public function view(User $user, OrderStatus $order)
    {
        return $user->isAdmin() || $user->is($order->user);
    }

    /**
     * Determine whether the user can create categories.
     *
     * @param \Modules\Accounts\Entities\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->is($order->user);
    }

    /**
     * Determine whether the user can update the address.
     *
     * @param \Modules\Accounts\Entities\User $user
     * @param OrderStatus $order
     * @return mixed
     */
    public function update(User $user, OrderStatus $order)
    {
        return $user->isAdmin() || $user->is($order->user);
    }

    /**
     * Determine whether the user can delete the address.
     *
     * @param \Modules\Accounts\Entities\User $user
     * @param OrderStatus $order
     * @return mixed
     */
    public function delete(User $user, OrderStatus $order)
    {
        return $user->isAdmin() || $user->is($order->user);
    }
}
