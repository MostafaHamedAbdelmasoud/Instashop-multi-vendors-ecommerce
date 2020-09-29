<?php

namespace Modules\OrderProducts\Policies;

use Modules\Accounts\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\OrderProducts\Entities\OrderProduct;
use Modules\OrderProducts\Entities\OrderProductFieldValue;

/**
 * Class StorePolicy.
 */
class OrderProductFieldValuePolicy
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
        return $user->isAdmin() || $user->is($coupon->user);
    }

    /**
     * Determine whether the user can update the address.
     *
     * @param \Modules\Accounts\Entities\User $user
     * @param OrderProductFieldValue $orderProductFieldValue
     * @return mixed
     */
    public function update(User $user, OrderProductFieldValue $orderProductFieldValue)
    {
        return $user->isAdmin() || $user->is($orderProductFieldValue->order->user);
    }

    /**
     * Determine whether the user can delete the address.
     *
     * @param \Modules\Accounts\Entities\User $user
     * @param OrderProduct $orderProduct
     * @return mixed
     */
    public function delete(User $user, OrderProductFieldValue $orderProductFieldValue)
    {
        return $user->isAdmin() || $user->is($orderProductFieldValue->order->user);
    }
}
