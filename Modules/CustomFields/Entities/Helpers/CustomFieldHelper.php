<?php

namespace Modules\CustomFields\Entities\Helpers;

use Modules\CustomFields\Entities\CustomField;

/**
 * Trait ProductHelper.
 */
trait CustomFieldHelper
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
    public function getStoreOfCustomField()
    {
        return $this->store->name;
    }

    /**
     * get category of product.
     *
     * @param Store $store
     * @return mixed
     */
    public function getCategoryOfCustomField()
    {
        return $this->category->name;
    }
}
