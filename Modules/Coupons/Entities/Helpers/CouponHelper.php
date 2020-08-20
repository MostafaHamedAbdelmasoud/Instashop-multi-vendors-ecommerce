<?php

namespace Modules\Coupons\Entities\Helpers;

use Modules\Stores\Entities\Store;

/**
 * Trait ProductHelper.
 */
trait CouponHelper
{
    /**
     * @return string
     */
    public function get_percentage_discount()
    {
        return $this->percentage_discount .' %';
    }

    /**
     * @return string
     */
    public function get_fixed_discount()
    {
        return $this->percentage_discount .' $';
    }

    /**
     * @return string
     */
    public function get_min_total()
    {
        return $this->min_total .' $';
    }
}
