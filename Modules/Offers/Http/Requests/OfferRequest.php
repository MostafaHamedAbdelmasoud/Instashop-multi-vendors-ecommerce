<?php

namespace Modules\Offers\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class OfferRequest extends FormRequest
{

    protected $start_date;
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
        $this->start_date= now();
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
                'model_id' => ['required'],
                '%name%' => ['required' , 'string' , 'max:100'],
                'fixed_discount_price' => ['required', 'numeric', 'max:1e7' , 'min:1'],
                'percentage_discount_price' => ['required', 'numeric', 'max:100'],
                'expire_at' => ['required', 'date',  'after:'.$this->start_date],
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
                'model_id' => ['required'],
                '%name%' => ['required' , 'string' , 'max:100'],
                'fixed_discount_price' => ['required', 'numeric', 'max:1e7' , 'min:1'],
                'percentage_discount_price' => ['required', 'numeric', 'max:100'],
                'expire_at' => ['required', 'date', 'after:'.$this->start_date],
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
        return trans('offers::offers.attributes');
    }
}
