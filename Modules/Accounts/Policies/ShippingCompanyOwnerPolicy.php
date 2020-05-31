<?php

namespace Modules\Accounts\Policies;

use Modules\Accounts\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Accounts\Entities\ShippingCompanyOwner;

class ShippingCompanyOwnerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any customers.
     *
     * @param  \Modules\Accounts\Entities\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the customer.
     *
     * @param \Modules\Accounts\Entities\User $user
     * @param ShippingCompanyOwner $shippingCompanyOwner
     * @return mixed
     */
    public function view(User $user, ShippingCompanyOwner $shippingCompanyOwner)
    {
        return $user->isAdmin() || $user->is($shippingCompanyOwner);
    }

    /**
     * Determine whether the user can create ShippingCompanyOwners.
     *
     * @param  \Modules\Accounts\Entities\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the ShippingCompanyOwner.
     *
     * @param  \Modules\Accounts\Entities\User  $user
     * @param  \Modules\Accounts\Entities\ShippingCompanyOwner  $shippingCompanyOwner
     * @return mixed
     */
    public function update(User $user, ShippingCompanyOwner $shippingCompanyOwner)
    {
        return $user->isAdmin() || $user->is($shippingCompanyOwner);
    }

    /**
     * Determine whether the user can update the type of the ShippingCompanyOwner.
     *
     * @param  \Modules\Accounts\Entities\User  $user
     * @param  \Modules\Accounts\Entities\ShippingCompanyOwner  $shippingCompanyOwner
     * @return mixed
     */
    public function updateType(User $user, ShippingCompanyOwner $shippingCompanyOwner)
    {
        return $user->isAdmin() && $user->isNot($shippingCompanyOwner);
    }

    /**
     * Determine whether the user can delete the ShippingCompanyOwner.
     *
     * @param  \Modules\Accounts\Entities\User  $user
     * @param  \Modules\Accounts\Entities\ShippingCompanyOwner  $shippingCompanyOwner
     * @return mixed
     */
    public function delete(User $user, ShippingCompanyOwner $shippingCompanyOwner)
    {
        return $user->isAdmin() && $user->isNot($shippingCompanyOwner);
    }
}
