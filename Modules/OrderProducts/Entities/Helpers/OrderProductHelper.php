<?php

namespace Modules\OrderProducts\Entities\Helpers;

use Modules\Stores\Entities\Store;

/**
 * Trait ProductHelper.
 */
trait OrderProductHelper
{
    /**
     * get id of order.
     *
     * @param Store $store
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->order->id;
    }

    /**
     * get name of product in the order.
     *
     * @param Store $store
     * @return mixed
     */
    public function getProductName()
    {
        return $this->product->name;
    }

    /**
     * get price of product in the order.
     *
     * @param Store $store
     * @return mixed
     */
    public function getProductPrice()
    {
        return $this->price . ' $';
    }

    /**
     * get price of product in the order.
     *
     * @param Store $store
     * @return mixed
     */
    public function getProductTotal()
    {
        return $this->total . ' $';
    }
}
