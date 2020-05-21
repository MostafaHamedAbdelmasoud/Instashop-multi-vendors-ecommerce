<?php

namespace Modules\Countries\Policies;

use Modules\Accounts\Entities\User;
use Modules\Countries\Entities\Country;
use Illuminate\Auth\Access\HandlesAuthorization;

class CountryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \Modules\Countries\Entities\User $user
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
     * @param \Modules\Countries\Entities\Country $model
     * @return mixed
     */
    public function view(User $user, Country $model)
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
     * @param \Modules\Countries\Entities\Country $model
     * @return mixed
     */
    public function update(User $user, Country $model)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \Modules\Accounts\Entities\User $user
     * @param \Modules\Countries\Entities\Country $model
     * @return mixed
     */
    public function delete(User $user, Country $model)
    {
        return $user->isAdmin();
    }
}
