<?php

namespace Modules\Subscriptions\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class SubscriptionRequest extends FormRequest
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
                'model_type' => ['required', 'string'],
                'model_id' => ['required', 'integer' ],
                'start_at' => ['required', 'date'],
                'end_at' => ['required', 'date'],
                'paid_amount' => ['required', 'numeric' , 'max:100000', 'min:1'],
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
                'model_type' => ['required', 'string'],
                'model_id' => ['required', 'integer'],
                'start_at' => ['required', 'date'],
                'end_at' => ['required', 'date'],
                'paid_amount' => ['required', 'numeric' , 'max:100000', 'min:1'],
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
        return trans('subscriptions::subscriptions.attributes');
    }
}
