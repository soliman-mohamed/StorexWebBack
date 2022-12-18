<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
        $id = $this->route('movie');
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'rate' => 'required|numeric|min:1|max:5',
            'category_id' => 'required|numeric|exists:categories,id',
            'image' => $id ? 'nullable' : 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
