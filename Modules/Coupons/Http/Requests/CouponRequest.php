<?php

namespace Modules\Coupons\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class CouponRequest extends FormRequest
{
    /**
     * Determine if the supervisor is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->isMethod('POST')) {
            return $this->createRules();
        } else {
            return $this->updateRules();
        }
    }

    /**
     * Get the create validation rules that apply to the request.
     *
     * @return array
     */
    public function createRules()
    {
        return RuleFactory::make(
            [
                'code' => ['required', 'string' , 'max:15'],
                'fixed_discount' => ['required', 'numeric', 'max:1e7' , 'min:1'],
                'percentage_discount' => ['required', 'numeric', 'max:100'],
                'max_usage_per_order' => ['required', 'max:100', 'min:0'],
                'max_usage_per_user' => ['required', 'max:100', 'min:0'],
                'min_total' => ['required', 'numeric', 'max:1e7', 'min:1'],
            ]
        );
    }

    /**
     * Get the update validation rules that apply to the request.
     *
     * @return array
     */
    public function updateRules()
    {
        return RuleFactory::make(
            [
                'code' => ['required', 'string' , 'max:15'],
                'fixed_discount' => ['required', 'numeric', 'max:1e7' , 'min:1'],
                'percentage_discount' => ['required', 'numeric', 'max:100'],
                'max_usage_per_order' => ['required', 'max:100', 'min:0'],
                'max_usage_per_user' => ['required', 'max:100', 'min:0'],
                'min_total' => ['required', 'numeric', 'max:1e7', 'min:1'],
            ]
        );
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return trans('products::products.attributes');
    }
}
