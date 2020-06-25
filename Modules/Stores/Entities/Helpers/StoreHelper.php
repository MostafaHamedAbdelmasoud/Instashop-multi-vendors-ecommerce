<?php

namespace Modules\Stores\Entities\Helpers;

use Modules\Accounts\Entities\User;

trait StoreHelper
{
    /**
     * The user profile image url.
     *
     * @return bool
     */
    public function getStoreAvatar()
    {
        return $this->getFirstMediaUrl('stores');
    }
}
