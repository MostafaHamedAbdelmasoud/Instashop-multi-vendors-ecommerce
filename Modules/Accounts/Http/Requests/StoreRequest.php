<?php

namespace Modules\Accounts\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'name' => ['required', 'string'],
            'is_verified' => ['nullable', 'boolean'],
            'plan' => ['required', 'string', 'max:255'],
            'domain' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'meta_description' => ['required', 'string'],
            'keywords' => ['required', 'string']
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return trans('accounts::addresses.attributes');
    }
}
