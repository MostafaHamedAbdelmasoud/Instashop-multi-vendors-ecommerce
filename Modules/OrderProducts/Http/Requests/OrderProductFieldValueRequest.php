<?php

namespace Modules\OrderProducts\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class OrderProductFieldValueRequest extends FormRequest
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
                'option_id' => ['required', 'exists:custom_field_options,id'],
                'custom_field_id' => ['required', 'exists:custom_fields,id'],
                'additional_price' => ['required', 'numeric', 'max:1e7', 'min:1'],
                'value' => ['required', 'string' , 'max:100', 'min:1'],
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
                'option_id' => ['required', 'exists:custom_field_options,id'],
                'custom_field_id' => ['required', 'exists:custom_fields,id'],
                'additional_price' => ['required', 'numeric', 'max:1e7', 'min:1'],
                'value' => ['required', 'string' , 'max:100', 'min:1'],
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
        return trans('order_products::order_product_field_values.attributes');
    }
}
