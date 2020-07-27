<?php

namespace Modules\Categories\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Accounts\Entities\User;
use Modules\Categories\Entities\Category;

/**
 * Class StorePolicy.
 */
class CategoryPolicy
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
     * @param Category $category
     * @return bool
     */
    public function view(User $user, Category $category)
    {
        return true;
//        return $user->isAdmin() || $user->is($category->store->StoreOwner);
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
     * @param Category $category
     * @return mixed
     */
    public function update(User $user, Category $category)
    {
        return $user->isAdmin() || $user->is($category->store->storeOwner);
    }

    /**
     * Determine whether the user can delete the address.
     *
     * @param \Modules\Accounts\Entities\User $user
     * @param Category $category
     * @return mixed
     */
    public function delete(User $user, Category $category)
    {
        return true;

//        return $user->isAdmin() || $user->is($category->store->StoreOwner);
    }
}
