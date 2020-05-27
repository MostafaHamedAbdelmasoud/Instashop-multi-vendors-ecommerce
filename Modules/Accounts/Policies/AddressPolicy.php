<?php

namespace Modules\Accounts\Policies;

use Modules\Accounts\Entities\User;
use Modules\Accounts\Entities\Address;
use Illuminate\Auth\Access\HandlesAuthorization;

class AddressPolicy
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
     * @param  \Modules\Accounts\Entities\Address  $address
     * @return mixed
     */
    public function update(User $user, Address $address)
    {
        return $user->isAdmin() || $user->is($address->customer);
    }

    /**
     * Determine whether the user can delete the address.
     *
     * @param  \Modules\Accounts\Entities\User  $user
     * @param  \Modules\Accounts\Entities\Address  $address
     * @return mixed
     */
    public function delete(User $user, Address $address)
    {
        return $user->isAdmin() || $user->is($address->customer);
    }
}
