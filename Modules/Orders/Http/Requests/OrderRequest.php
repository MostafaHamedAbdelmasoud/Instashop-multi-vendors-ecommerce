<?php

namespace Modules\Orders\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class OrderRequest extends FormRequest
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
                'user_id' => ['required', 'exists:users,id'],
                'coupon_id' => ['required', 'exists:coupons,id'],
                'shipping_company_id' => ['required', 'exists:shipping_companies,id'],
                'shipping_company_notes' => ['required', 'string'],
                'discount' => ['required', 'numeric', 'max:100.00', 'min:0'],
                'subtotal' => ['required', 'numeric', 'max:1e7', 'min:1'],
                'total' => ['required', 'numeric', 'max:1e7', 'min:1'],
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
                'coupon_id' => ['required', 'exists:coupons,id'],
                'shipping_company_id' => ['required', 'exists:shipping_companies,id'],
                'address_id' => ['required', 'exists:addresses,id'],
                'shipping_company_notes' => ['required', 'string'],
                'discount' => ['required', 'numeric', 'max:100.00', 'min:0'],
                'subtotal' => ['required', 'numeric', 'max:1e7', 'min:1'],
                'total' => ['required', 'numeric', 'max:1e7', 'min:1'],
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
        return trans('orders::orders.attributes');
    }
}
