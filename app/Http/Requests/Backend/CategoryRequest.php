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
                'locked' => 'sometimes|boolean',
                'image'=> 'nullable|image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
                'link_youtube' => 'array',
                'link_youtube.*' => 'nullable|url',
            ];
        } else {
            return [
                'ceo_title' => 'required|min:2|max:100',
                'name' => 'required|min:2|max:100',
                'locked' => 'sometimes|boolean',
                'type' => 'required|in:' . implode(',', config('common.category.type')),
                'image' => 'required|image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
                'link_youtube' => 'array',
                'link_youtube.*' => 'nullable|url',
            ];
        }
    }

    protected function prepareForValidation()
    {
        if ($this->has('link_youtube')) {
            $this->merge([
                'link_youtube' => array_filter($this->link_youtube),
            ]);
        }
    }

    public function attributes()
    {
        return [
            'ceo_title' => __('repositories.label.ceo_title'),
            'name' => __('repositories.label.name'),
            'locked' => __('repositories.label.locked'),
            'image' => __('repositories.label.image'),
            'banner' => __('repositories.label.banner'),
            'icon' => __('repositories.label.icon'),
            'type' => __('repositories.label.type'),
            'image' => __('repositories.label.image'),
            'link_youtube' => __('repositories.label.link_youtube'),
        ];
    }
}
