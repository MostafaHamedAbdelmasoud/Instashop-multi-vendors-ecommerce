<?php

namespace Modules\Products\Entities\Helpers;

use Modules\Stores\Entities\Store;

/**
 * Trait ProductHelper.
 */
trait ProductHelper
{
    /**
     * get store owner of product store.
     *
     * @param Store $store
     * @return mixed
     */
    public function getStoreOwner()
    {
        return $this->store->StoreOwner->name;
    }

    /**
     * get store owner of product store.
     *
     * @param Store $store
     * @return mixed
     */
    public function getStoreOfProduct()
    {
        return $this->store->name;
    }

    /**
     * get category of product.
     *
     * @param Store $store
     * @return mixed
     */
    public function getCategoryOfProduct()
    {
        return $this->category->name;
    }

    /**
     * get weight of product.
     *
     * @param Store $store
     * @return mixed
     */
    public function getWeightOfProduct()
    {
        return $this->weight;
    }
}
