<?php

namespace Modules\Countries\Policies;

use Modules\Accounts\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\ShippingCompanies\Entities\ShippingCompany;

/**
 * Class ShippingCompanyPolicy.
 */
class ShippingCompanyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \Modules\Accounts\Entities\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \Modules\Accounts\Entities\User $user
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \Modules\Accounts\Entities\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \Modules\Accounts\Entities\User $user
     * @param \Modules\ShippingCompanies\Entities\ShippingCompanyOwner $shippingCompanyOwner
     * @return mixed
     */
    public function update(User $user, ShippingCompanyOwner $shippingCompanyOwner)
    {
        return $user->isAdmin() || $user->is($shippingCompanyOwner);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \Modules\Accounts\Entities\User $user
     * @return mixed
     */
    public function delete(User $user, ShippingCompanyOwner $shippingCompanyOwner)
    {
        return $user->isAdmin() || $user->is($shippingCompanyOwner);
    }
}
