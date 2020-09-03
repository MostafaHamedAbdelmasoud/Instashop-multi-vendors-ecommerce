<?php

namespace Modules\Accounts\Entities;

use Parental\HasParent;
use Modules\Accounts\Entities\Relations\CustomerRelations;

/**
 * Class Customer.
 */
class Customer extends User
{
    use HasParent, CustomerRelations;

    /**
     * eager loading.
     *
     * @var string[]
     */
    protected $with = [
        'addresses',
    ];

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
        return 'user_id';
    }
}
