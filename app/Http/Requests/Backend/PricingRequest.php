<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class PricingRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'params' => 'array',
            'params.*.icon' => 'required|min:2|max:30',
            'params.*.title' => 'required|min:2|max:30',
            'params.*.description' => 'required',
            'params.*.price' => 'required|min:2|max:30',
        ];
    }

    public function attributes()
    {
        return [
            'params.*.icon' => __('repositories.label.icon'),
            'params.*.url' => __('repositories.label.url'),
            'params.*.title' => __('repositories.label.title'),
            'params.*.price' => __('repositories.label.price'),
            'params.*.description' => __('repositories.label.description'),
        ];
    }
}
