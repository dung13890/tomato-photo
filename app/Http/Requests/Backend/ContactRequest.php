<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class ContactRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|min:2|max:175',
            'image'=> 'nullable|image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
        ];
    }

    public function attributes()
    {
        return [
            'first_name' => __('repositories.label.name'),
            'last_name' => __('repositories.label.last_name'),
            'email' => __('repositories.label.email'),
            'company' => __('repositories.label.company'),
            'avatar' => __('repositories.label.avatar'),
        ];
    }
}
