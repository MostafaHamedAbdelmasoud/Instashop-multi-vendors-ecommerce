<?php

namespace Modules\CustomFieldOptions\Entities\Helpers;

/**
 * Trait ProductHelper.
 */
trait CustomFieldOptionHelper
{
    /**
     * get store owner of product store.
     *
     * @param Store $store
     * @return mixed
     */
    public function getCustomFieldName()
    {
        return $this->customField->name;
    }

    /**
     * get category of product.
     *
     * @param Store $store
     * @return mixed
     */
    public function getCustomFieldOptionProductName()
    {
        return $this->product->name;
    }
}
