<?php

namespace Modules\Accounts\Entities\Relations;

trait AddressRelations
{
    public function customer()
    {
        return $this->belongsTo('\Modules\Accounts\Entities\Customer');
    }

    /*
    * @* @param Type var Description
    */
    protected function user($value)
    {
        if ($value) {
            return $this->builder->where('user_id', $value);
        }

        return $this->builder;
    }
}
