<?php

namespace Modules\Subscriptions\Entities\Helpers;

use Carbon\Traits\Date;
use Modules\Stores\Entities\Store;
use Modules\Accounts\Entities\ShippingCompany;

/**
 * Trait SubscriptionHelper.
 */
trait SubscriptionHelper
{
    /**
     * return type store or shipping_company.
     * @return mixed
     */
    public function get_model_type()
    {
        return $this->model_type;
    }

    /**
     * it return the model of subscription.
     *
     * @return mixed
     */
    public function get_model()
    {
        if ($this->get_model_type() == 'store') {
            $model = Store::find($this->model_id)->first();
        } else {
            $model = ShippingCompany::find($this->model_id)->first();
        }

        return $model;
    }

    public function get_date_with_format($date)
    {
        return $date->format('Y-m-d');
    }
}
