<?php

namespace Modules\Countries\Entities\Helpers;

trait CountryHelper
{
    /**
     * The user profile image url.
     *
     * @return bool
     */
    public function getFlag()
    {
        return $this->getFirstMediaUrl('flags');
    }
}
