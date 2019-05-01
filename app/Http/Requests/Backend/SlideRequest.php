<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class SlideRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->slide) {
            return [
                'description' => 'nullable|max:200',
                'image'=> 'nullable|nullable|image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
            ];
        } else {
            return [
                'description' => 'nullable|max:200',
                'image'=> 'required|nullable|image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
            ];
        }
    }

    public function attributes()
    {
        return [
            'description' => __('repositories.label.description'),
            'image' => __('repositories.label.image'),
        ];
    }
}
