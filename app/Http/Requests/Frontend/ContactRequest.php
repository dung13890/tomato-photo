<?php

namespace App\Http\Requests\Frontend;

use App\Http\Requests\Request;

class ContactRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|min:2|max:175',
            'last_name' => 'required|min:2|max:175',
            'email' => 'required|email|max:255|unique:contacts',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => __('repositories.frontend.text.required'),
            '*.min' => __('repositories.frontend.text.min'),
            '*.max' => __('repositories.frontend.text.max'),
            '*.email' => __('repositories.frontend.text.email'),
            '*.unique' => __('repositories.frontend.text.unique'),
        ];
    }

    public function attributes()
    {
        return [
            'first_name' => __('repositories.label.first_name'),
            'last_name' => __('repositories.label.last_name'),
            'company' => __('repositories.label.company'),
            'email' => __('repositories.label.email'),
        ];
    }
}
