<?php

namespace Modules\CustomFieldOptions\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Products\Entities\Product;
use Modules\CustomFields\Entities\CustomField;
use Modules\CustomFieldOptions\Http\Filters\SelectProductFilter;
use Modules\CustomFieldOptions\Transformers\SelectProductResource;
use Modules\CustomFieldOptions\Http\Filters\SelectCustomFieldFilter;
use Modules\CustomFieldOptions\Transformers\SelectCustomFieldResource;

/**
 * Class SelectController.
 */
class SelectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Modules\CustomFieldOptions\Http\Filters\SelectProductFilter  $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select_product(SelectProductFilter $filter)
    {
        $products = Product::filter($filter)->paginate();

        return SelectProductResource::collection($products);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Modules\CustomFieldOptions\Http\Filters\SelectProductFilter  $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select_custom_field(SelectCustomFieldFilter $filter)
    {
        $customField= CustomField::filter($filter)->paginate();

        return SelectCustomFieldResource::collection($customField);
    }
}
