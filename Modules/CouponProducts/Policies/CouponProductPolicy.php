<?php

namespace Modules\CouponProducts\Policies;

use Modules\Accounts\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\CouponProducts\Entities\CouponProduct;

/**
 * Class StorePolicy.
 */
class CouponProductPolicy
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
     * @param CouponProduct $couponProduct
     * @return bool
     */
    public function view(User $user, CouponProduct $couponProduct)
    {
        return $user->isAdmin() || $user->is($couponProduct->coupon->order->user_id);
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
     * @param CouponProduct $couponProduct
     * @return mixed
     */
    public function update(User $user, CouponProduct $couponProduct)
    {
        return $user->isAdmin() || $user->is($couponProduct->coupon->order->user_id);
    }

    /**
     * Determine whether the user can delete the address.
     *
     * @param \Modules\Accounts\Entities\User $user
     * @param CouponProduct $couponProduct
     * @return mixed
     */
    public function delete(User $user, CouponProduct $couponProduct)
    {
        return $user->isAdmin() || $user->is($couponProduct->coupon->order->user_id);
    }
}
