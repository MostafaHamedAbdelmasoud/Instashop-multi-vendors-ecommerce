<?php

namespace Modules\TemplateBanners\Policies;

use Modules\Accounts\Entities\User;
use Modules\TemplateBanners\Entities\TemplateBanner;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class StorePolicy.
 */
class TemplateBannerPolicy
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
     * @param TemplateBanner $templateBanner
     * @return bool
     */
    public function view(User $user, TemplateBanner $templateBanner)
    {
        return $user->isAdmin() || $user->is($templateBanner->order->user_id);
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
     * @param TemplateBanner $templateBanner
     * @return mixed
     */
    public function update(User $user, TemplateBanner $templateBanner)
    {
        return $user->isAdmin() || $user->is($templateBanner->order->user_id);
    }

    /**
     * Determine whether the user can delete the address.
     *
     * @param \Modules\Accounts\Entities\User $user
     * @param TemplateBanner $templateBanner
     * @return mixed
     */
    public function delete(User $user, TemplateBanner $templateBanner)
    {
        return $user->isAdmin() || $user->is($templateBanner->order->user_id);
    }
}
