<?php

namespace Modules\Orders\Entities\Helpers;

use Modules\Stores\Entities\Store;

/**
 * Trait ProductHelper.
 */
trait OrderHelper
{
    /**
     * get name of user.
     *
     * @param Store $store
     * @return mixed
     */
    public function getUserName()
    {
        return $this->user->name;
    }

    /**
     * get name of shipping company.
     *
     * @param Store $store
     * @return mixed
     */
    public function getShippingCompanyName()
    {
        return $this->shipping_company->name;
    }

    /**
     * get address of user.
     *
     * @param Store $store
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address->address;
    }

    /**
     * get code of coupon.
     *
     * @param Store $store
     * @return mixed
     */
    public function getCouponCode()
    {
        return $this->coupon->code;
    }

    /**
     * get discount of product.
     *
     * @param Store $store
     * @return mixed
     */
    public function getDiscountValue()
    {
        return $this->discount . ' %';
    }
}
