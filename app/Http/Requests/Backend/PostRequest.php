<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class PostRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->post) {
            return [
                'name' => 'required|min:2|max:175',
                'ceo_title' => 'nullable|max:200',
                'ceo_description' => 'nullable|max:250',
                'ceo_keywords' => 'nullable|max:150',
                'image'=> 'nullable|image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
            ];
        } else {
            return [
                'name' => 'required|min:2|max:175',
                'ceo_title' => 'nullable|max:200',
                'ceo_description' => 'nullable|max:250',
                'ceo_keywords' => 'nullable|max:150',
                'image'=> 'required|image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
            ];
        }
    }

    public function attributes()
    {
        return [
            'name' => __('repositories.label.name'),
            'ceo_title' => __('repositories.label.ceo_title'),
            'ceo_description' => __('repositories.label.ceo_description'),
            'ceo_keywords' => __('repositories.label.ceo_keywords'),
            'image' => __('repositories.label.image'),
        ];
    }
}
