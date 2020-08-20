<?php

namespace Modules\Coupons\Policies;

use Modules\Accounts\Entities\User;
use Modules\Coupons\Entities\Coupon;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class StorePolicy.
 */
class CouponPolicy
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
     * @param Coupon $coupon
     * @return bool
     */
    public function view(User $user, Coupon $coupon)
    {
        return $user->isAdmin() || $user->is($coupon->order->user_id);
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
     * @param Coupon $coupon
     * @return mixed
     */
    public function update(User $user, Coupon $coupon)
    {
        return $user->isAdmin() || $user->is($coupon->order->user_id);
    }

    /**
     * Determine whether the user can delete the address.
     *
     * @param \Modules\Accounts\Entities\User $user
     * @param Coupon $coupon
     * @return mixed
     */
    public function delete(User $user, Coupon $coupon)
    {
        return $user->isAdmin() || $user->is($coupon->order->user_id);
    }
}
