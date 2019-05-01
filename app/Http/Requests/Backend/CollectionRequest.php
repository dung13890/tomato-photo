<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class CollectionRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'collection_title' => 'required|min:2|max:100',
        ];
    }

    public function attributes()
    {
        return [
            'collection_title' => __('repositories.label.collection_title'),
        ];
    }
}
