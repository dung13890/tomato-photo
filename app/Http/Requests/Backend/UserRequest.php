<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class UserRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->user) {
            return [
                'name' => "required|min:4|max:255",
                'username' => "required|alpha_dash|min:4|max:255|unique:users,username," . $this->user->id,
                'email' => "required|email|max:255|unique:users,email," . $this->user->id,
                'password' => 'nullable|confirmed|alpha_dash|min:6',
                'password_confirmation' => 'nullable|min:6',
            ];
        } else {
            return [
                'name' => "required|min:4|max:255",
                'username' => "required|alpha_dash|min:4|max:255|unique:users",
                'email' => "required|email|max:255|unique:users",
                'password' => 'required|alpha_dash|confirmed|min:6',
                'password_confirmation' => 'required|min:6',
            ];
        }
    }

    public function attributes()
    {
        return [
            'name' => __('repositories.label.name'),
            'username' => __('repositories.label.username'),
            'email' => __('repositories.label.email'),
            'password' => __('repositories.label.password'),
            'password_confirmation' => __('repositories.label.password_confirmation'),
            'role_id' => __('repositories.label.role_id'),
        ];
    }
}
