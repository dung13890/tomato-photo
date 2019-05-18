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
            'name' => 'required|min:2|max:175',
            'email' => 'required|email|max:255',
            'message' => 'required',
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
            'name' => __('repositories.label.first_name'),
            'email' => __('repositories.label.email'),
            'message' => __('repositories.label.contact_message'),
        ];
    }
}
