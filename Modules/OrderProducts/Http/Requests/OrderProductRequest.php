<?php

namespace Modules\OrderProducts\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class OrderProductRequest extends FormRequest
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
                'product_id' => ['required', 'exists:products,id'],
                'order_id' => ['required', 'exists:orders,id'],
                'price' => ['required', 'numeric', 'max:1e7', 'min:1'],
                'quantity' => ['required', 'integer'],
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
                'product_id' => ['required', 'exists:products,id'],
                'order_id' => ['required', 'exists:orders,id'],
                'price' => ['required', 'numeric', 'max:1e7', 'min:1'],
                'quantity' => ['required', 'integer'],
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
