<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class CategoryRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->category) {
            return [
                'ceo_title' => 'required|min:2|max:100',
                'name' => 'required|min:2|max:100',
                'title' => 'required|min:2|max:255',
                'locked' => 'sometimes|boolean',
            ];
        } else {
            return [
                'ceo_title' => 'required|min:2|max:100',
                'name' => 'required|min:2|max:100',
                'title' => 'required|min:2|max:255',
                'locked' => 'sometimes|boolean',
                'type' => 'required|in:' . implode(',', config('common.category.type')),
            ];
        }
    }

    public function attributes()
    {
        return [
            'ceo_title' => __('repositories.label.ceo_title'),
            'name' => __('repositories.label.name'),
            'title' => __('repositories.label.title'),
            'locked' => __('repositories.label.locked'),
            'image' => __('repositories.label.image'),
            'banner' => __('repositories.label.banner'),
            'icon' => __('repositories.label.icon'),
            'type' => __('repositories.label.type'),
        ];
    }
}
