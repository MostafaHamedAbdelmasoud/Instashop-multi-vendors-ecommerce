<?php

namespace Modules\Products\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class ProductRequest extends FormRequest
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
                '%name%' => ['required', 'string'],
                'store_id' => ['required', 'exists:stores,id'],
                'category_id' => ['required', 'exists:categories,id'],
                'code' => ['required', 'string', 'max:30' , 'min:1'],
                'price' => ['required', 'numeric', 'max:1e7' , 'min:1'],
                'old_price' => ['required', 'numeric', 'max:1e7' , 'min:1'],
                'weight' => ['required', 'integer'],
                'stock' => ['required', 'integer'],
                '%description%' => ['required', 'max:1500', 'min:2'],
                '%meta_description%' => ['required', 'max:200', 'min:2'],
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
                '%name%' => ['required', 'string'],
                'store_id' => ['required', 'exists:stores,id,' . $this->route('product')->id],
                'category_id' => ['required', 'exists:categories,id,'.$this->route('product')->id],
                'code' => ['required', 'string', 'max:30' , 'min:1'],
                'price' => ['required', 'numeric', 'max:1e7' , 'min:1'],
                'old_price' => ['required', 'numeric', 'max:1e7' , 'min:1'],
                'weight' => ['required', 'integer'],
                'stock' => ['required', 'integer'],
                '%description%' => ['required', 'max:1500', 'min:2'],
                '%meta_description%' => ['required', 'max:200', 'min:2'],
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
