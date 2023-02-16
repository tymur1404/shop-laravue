<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'required',
            'content' => 'required',
            'preview_image' => 'required',
            'price' => 'required',
            'count' => 'required',
            'is_published' => 'nullable',
            'category_id' => 'nullable',
            'tags' => 'nullable|array',
            'colors' => 'nullable|array',
        ];
    }
}
