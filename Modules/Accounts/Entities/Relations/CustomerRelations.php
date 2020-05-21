<?php

namespace Modules\Accounts\Entities\Relations;

use Modules\Accounts\Entities\Address;

trait CustomerRelations
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
