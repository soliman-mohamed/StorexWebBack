<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->route('user');
        return [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,'.$id,
            'phone' => 'required|regex:/(01)[0-9]{9}/|unique:users,phone,'.$id,
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => $id ? '' : 'required|string|min:6|max:255|confirmed'
        ];
    }
}
