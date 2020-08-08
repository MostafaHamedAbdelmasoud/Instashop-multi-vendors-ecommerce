<?php

namespace Modules\Stores\Policies;

use Modules\Stores\Entities\Store;
use Modules\Accounts\Entities\User;
use Modules\Accounts\Entities\StoreOwner;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class StorePolicy.
 */
class StorePolicy
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
     * @param StoreOwner $storeOwner
     * @return bool
     */
    public function view(User $user, Store $store)
    {
        return $user->isAdmin() || $user->is($store->StoreOwner) ;
    }

    /**
     * Determine whether the user can create addresses.
     *
     * @param  \Modules\Accounts\Entities\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->isStoreOwner();
    }

    /**
     * Determine whether the user can update the address.
     *
     * @param  \Modules\Accounts\Entities\User  $user
     * @param  \Modules\Accounts\Entities\Store  $store
     * @return mixed
     */
    public function update(User $user, Store $store)
    {
        return $user->isAdmin() || $user->is($store->StoreOwner);
    }

    /**
     * Determine whether the user can delete the address.
     *
     * @param  \Modules\Accounts\Entities\User  $user
     * @param  \Modules\Accounts\Entities\Store  $store
     * @return mixed
     */
    public function delete(User $user, Store $store)
    {
        return $user->isAdmin() || $user->is($store->StoreOwner);
    }
}
