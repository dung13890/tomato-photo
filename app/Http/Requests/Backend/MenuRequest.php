<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class MenuRequest extends Request
{
    public function rules()
    {
        return [
            'name' => 'required|min:2|max:30',
            'url' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('repositories.label.name'),
            'url' => __('repositories.label.url'),
        ];
    }
}
