<?php

namespace Modules\Accounts\Policies;

use Modules\Accounts\Entities\User;
use Modules\Accounts\Entities\ShippingCompany;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class ShippingCompanyPolicy.
 */
class ShippingCompanyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->isShippingCompanyOwner();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param ShippingCompany $shippingCompany
     * @return mixed
     */
    public function update(User $user, ShippingCompany $shippingCompany)
    {
        return $user->isAdmin() || $user->is($shippingCompany->ShippingCompanyOwner);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param ShippingCompany $shippingCompany
     * @return mixed
     */
    public function delete(User $user, ShippingCompany $shippingCompany)
    {
        return $user->isAdmin() || $user->is($shippingCompany->ShippingCompanyOwner);
    }
}
