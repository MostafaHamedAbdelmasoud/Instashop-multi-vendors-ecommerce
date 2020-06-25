<?php

namespace Modules\Accounts\Entities;

use Parental\HasParent;
use Modules\Stores\Entities\Store;
use Modules\Accounts\Entities\Relations\CustomerRelations;

/**
 * Class StoreOwner.
 */
class StoreOwner extends User
{
    use HasParent;

    /**
     * Get the class name for polymorphic relations.
     *
     * @return string
     */
    public function getMorphClass()
    {
        return User::class;
    }

    /**
     * Get the default foreign key name for the model.
     *
     * @return string
     */
    public function getForeignKey()
    {
        return 'owner_id';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stores()
    {
        return $this->hasMany(Store::class);
    }
}
