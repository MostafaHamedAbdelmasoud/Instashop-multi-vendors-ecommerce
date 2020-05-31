<?php

namespace Modules\Accounts\Entities;

use Parental\HasParent;
use Modules\Accounts\Entities\ShippingCompany;
use Modules\Accounts\Entities\Relations\CustomerRelations;

/**
 * Class ShippingCompanyOwner.
 */
class ShippingCompanyOwner extends User
{
    use HasParent, CustomerRelations;

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
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function ShippingCompanies()
    {
        return $this->hasMany(ShippingCompany::class);
    }
}
