<?php

namespace Modules\Offers\Entities\Helpers;

use Modules\Stores\Entities\Store;
use Illuminate\Support\Facades\Lang;
use Modules\Products\Entities\Product;
use Modules\Categories\Entities\Category;

/**
 * Trait ProductHelper.
 */
trait OfferHelper
{
    /**
     * get fixed discount in pretty shape.
     *
     * @return string
     */
    public function getFixedDiscountPrice()
    {
        return $this->fixed_discount_price . ' $';
    }

    /**
     * get fixed discount in pretty shape.
     *
     * @return string
     */
    public function getPercentageDiscountPrice()
    {
        return $this->percentage_discount_price . ' %';
    }

    /**
     * get model type [category , store , product].
     *
     * @return string
     */
    public function getModelType()
    {
        return trans('offers::offers.type.' . $this->model_type);
    }

    /**
     * return model by id.
     *
     * @param $model
     * @param $id
     * @return mixed
     */
    public function findModel($model, $id)
    {
        $instance = new $model;

        return $instance->findOrFail($id);
    }

    /**
     * get fixed discount in pretty shape.
     *
     * @return string
     */
    public function getModel()
    {
        $id = $this->model_id;

        $model_name = Lang::get('offers::offers.type.' . $this->model_type, [], 'en');

        if ($model_name == 'Category') {
            $model = $this->findModel(Category::class, $id);
        } elseif ($model_name == 'Product') {
            $model = $this->findModel(Product::class, $id);
        } else {
            $model = $this->findModel(Store::class, $id);
        }

        return $model;
    }


    /**
     * return name of model
     *
     * @return mixed
     */
    public function getModelName()
    {
        return $this->getModel()->name;
    }

    public function OfferResourse(array $arr)
    {

    }
}
