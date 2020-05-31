<?php

namespace Modules\Accounts\Policies;

use Modules\Accounts\Entities\User;
use Modules\Accounts\Entities\Store;
use Illuminate\Auth\Access\HandlesAuthorization;

class StorePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create addresses.
     *
     * @param  \Modules\Accounts\Entities\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin();
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
