<?php

namespace Modules\Stores\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Astrotomic\Translatable\Validation\RuleFactory;

class StoreRequest extends FormRequest
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
                'is_verified' => ['boolean'],
                'plan' => ['required', 'string', 'max:255'],
                'domain' => ['required', 'string', 'unique:stores,domain', 'max:255'],
                '%description%' => ['required'],
                '%meta_description%' => ['required'],
                '%keywords%' => ['required'],
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
                'is_verified' => ['nullable', 'boolean'],
                'plan' => ['required', 'string', 'max:255'],
                'domain' => ['required', 'string', 'max:255', 'unique:stores,domain,' . $this->route('store')->id],
                '%description%' => ['required', 'string'],
                '%meta_description%' => ['required', 'string'],
                '%keywords%' => ['required', 'string'],
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
        return trans('stores::stores.attributes');
    }
}
