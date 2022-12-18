<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => __('username field is require'),
            'username.string' => __('username field must be string'),
            'username.max' => __("username field can't be more than 255 letter"),
            'password.required' => __('password field is require'),
            'password.string' => __('password field must be string'),
            'password.max' => __("password field can't be more than 255 letter"),
        ];
    }
}
