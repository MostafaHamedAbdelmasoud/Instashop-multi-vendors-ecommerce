<?php

namespace Modules\Products\Policies;

use Modules\Accounts\Entities\User;
use Modules\Products\Entities\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class StorePolicy.
 */
class ProductPolicy
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
     * @param Product $product
     * @return bool
     */
    public function view(User $user, Product $product)
    {
        return $user->isAdmin() || $user->is($product->store->StoreOwner);
    }

    /**
     * Determine whether the user can create categories.
     *
     * @param \Modules\Accounts\Entities\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->is($store->StoreOwner);
    }

    /**
     * Determine whether the user can update the address.
     *
     * @param \Modules\Accounts\Entities\User $user
     * @param Product $product
     * @return mixed
     */
    public function update(User $user, Product $product)
    {
        return $user->isAdmin() || $user->is($product->store->StoreOwner);
    }

    /**
     * Determine whether the user can delete the address.
     *
     * @param \Modules\Accounts\Entities\User $user
     * @param Product $product
     * @return mixed
     */
    public function delete(User $user, Product $product)
    {
        return $user->isAdmin() || $user->is($product->store->StoreOwner);
    }
}
