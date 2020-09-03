<?php

namespace Modules\CouponProducts\Entities\Helpers;

/**
 * Trait ProductHelper.
 */
trait CouponProductHelper
{
    /**
     * @return string
     */
    public function getCouponCode()
    {
        return $this->coupon->code;
    }

    /**
     * it returns name of model.
     *
     * @param $model_type
     * @param $model_id
     * @return string
     */
    public function getModelName()
    {
        if ($this->model_type == 'product') {
            $name = $this->product->name;
        } else {
            $name = $this->category->name;
        }

        return $name;
    }
}
