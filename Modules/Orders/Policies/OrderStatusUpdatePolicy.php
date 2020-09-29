<?php

namespace Modules\Orders\Policies;

use Modules\Orders\Entities\Order;
use Modules\Accounts\Entities\User;
use Modules\Orders\Entities\OrderStatusUpdate;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class StorePolicy.
 */
class OrderStatusUpdatePolicy
{
    use HandlesAuthorization;

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
     * @param OrderStatusUpdate $orderStatusUpdate
     * @return mixed
     */
    public function update(User $user, OrderStatusUpdate $orderStatusUpdate)
    {
        return $user->isAdmin() || $user->is($orderStatusUpdate->order->user);
    }

    /**
     * Determine whether the user can delete the address.
     *
     * @param \Modules\Accounts\Entities\User $user
     * @param Order $order
     * @return mixed
     */
    public function delete(User $user, OrderStatusUpdate $orderStatusUpdate)
    {
        return $user->isAdmin() || $user->is($orderStatusUpdate->order->user);
    }
}
